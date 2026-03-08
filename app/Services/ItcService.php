<?php

namespace App\Services;

use App\Models\Booking;
use App\Models\DriverInfo;
use App\Models\ItcSyncLog;
use App\Models\Lead;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ItcService
{
    protected string $baseUrl;
    protected string $username;
    protected string $password;
    protected string $apiKey;
    protected int $tokenCacheTtl;

    public function __construct()
    {
        $this->baseUrl = rtrim(config('itc.base_url'), '/');
        $this->username = config('itc.username');
        $this->password = config('itc.password');
        $this->apiKey = config('itc.api_key');
        $this->tokenCacheTtl = config('itc.token_cache_ttl', 55);
    }

    /**
     * Get authentication token from ITC API (cached for 55 minutes).
     */
    public function getToken(): ?string
    {
        return Cache::remember('itc_auth_token', $this->tokenCacheTtl * 60, function () {
            try {
                $response = Http::post("{$this->baseUrl}/getToken", [
                    'UserName' => $this->username,
                    'Password' => $this->password,
                    'ApiKey' => $this->apiKey,
                ]);

                if ($response->successful()) {
                    $data = $response->json();
                    $token = $data['Token'] ?? $data['token'] ?? null;

                    $this->logSync('token', $token ? 'success' : 'failed', null, null, [
                        'UserName' => $this->username,
                    ], $data, $token ? null : 'No token in response');

                    return $token;
                }

                $this->logSync('token', 'failed', null, null, [
                    'UserName' => $this->username,
                ], $response->json(), 'HTTP ' . $response->status());

                return null;
            } catch (\Exception $e) {
                $this->logSync('token', 'failed', null, null, [
                    'UserName' => $this->username,
                ], null, $e->getMessage());

                Log::error('ITC getToken failed: ' . $e->getMessage());
                return null;
            }
        });
    }

    /**
     * Clear cached token.
     */
    public function clearTokenCache(): void
    {
        Cache::forget('itc_auth_token');
    }

    /**
     * Make an authenticated API request with Bearer token.
     */
    protected function authenticatedRequest(string $endpoint, array $payload = []): ?\Illuminate\Http\Client\Response
    {
        $token = $this->getToken();
        if (!$token) return null;

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->post("{$this->baseUrl}/{$endpoint}", $payload);

        // Token might be expired, retry once
        if ($response->status() === 401) {
            $this->clearTokenCache();
            $token = $this->getToken();
            if (!$token) return null;

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
            ])->post("{$this->baseUrl}/{$endpoint}", $payload);
        }

        return $response;
    }

    /**
     * Call ITC getVehiclePermits API.
     */
    public function getVehiclePermits(array $filters = []): ?array
    {
        try {
            $payload = array_filter([
                'PlateNo' => $filters['PlateNo'] ?? null,
                'ChassisNo' => $filters['ChassisNo'] ?? null,
                'CnNumber' => $filters['CnNumber'] ?? null,
            ]);

            $response = $this->authenticatedRequest('getVehiclePermits', $payload);

            if ($response && $response->successful()) {
                return $response->json();
            }

            return null;
        } catch (\Exception $e) {
            Log::error('ITC getVehiclePermits failed: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Sync a single vehicle's ITC permit data.
     */
    public function syncVehiclePermit(Vehicle $vehicle, string $triggeredBy = 'manual'): bool
    {
        $filters = [];
        if ($vehicle->plate_number) {
            $filters['PlateNo'] = $vehicle->plate_number;
        }
        if ($vehicle->itc_chassis_number) {
            $filters['ChassisNo'] = $vehicle->itc_chassis_number;
        }

        $response = $this->getVehiclePermits($filters);

        if (!$response) {
            $this->logSync('vehicle_permit', 'failed', 'Vehicle', $vehicle->id, $filters, $response, 'No response from ITC', $triggeredBy);
            return false;
        }

        // Extract permit data - API returns "Vehicles" array
        $permits = $response['Vehicles'] ?? $response['vehicles'] ?? [];

        if (empty($permits)) {
            $this->logSync('vehicle_permit', 'failed', 'Vehicle', $vehicle->id, $filters, $response, 'No permits found in response', $triggeredBy);
            return false;
        }

        // Use first matching permit
        $permit = is_array($permits) && isset($permits[0]) ? $permits[0] : $permits;

        $vehicle->update([
            'itc_permit_number' => $this->emptyToNull($permit['PermitNumber'] ?? null),
            'itc_permit_expiry_date' => $this->parseDate($permit['PermitExpiryDate'] ?? null),
            'itc_plate_source' => $this->emptyToNull($permit['PlateSource'] ?? null),
            'itc_insurance_type' => $this->emptyToNull($permit['InsuranceType'] ?? null),
            'itc_insurance_provider' => $this->emptyToNull($permit['InsuranceProvider'] ?? null),
            'itc_insurance_policy_number' => $this->emptyToNull($permit['InsurancePolicyNumber'] ?? null),
            'itc_registration_expiry_date' => $this->parseDate($permit['RegistrationExpiryDate'] ?? null),
            'itc_operator_type' => $this->emptyToNull($permit['OperatorType'] ?? null),
            'itc_vehicle_brand' => $this->emptyToNull($permit['VehicleBrand'] ?? null),
            'itc_vehicle_year' => $permit['VehicleYear'] ?? null,
            'itc_vehicle_model' => $this->emptyToNull($permit['VehicleModel'] ?? null),
            'itc_chassis_number' => $this->emptyToNull($permit['ChassisNumber'] ?? null),
            'itc_permit_status' => $this->emptyToNull($permit['PermitStatus'] ?? null),
            'itc_is_eligible_for_trip' => $this->parseYesNo($permit['IsEligibleForTrip'] ?? null),
            'itc_last_status_date' => $this->parseDate($permit['LastStatusDate'] ?? null),
            'itc_remarks' => $this->emptyToNull($permit['Remarks'] ?? null),
            'itc_operator_info' => $permit['OperatorInfo'] ?? null,
            'itc_raw_response' => $permit,
            'itc_last_synced_at' => now(),
            'itc_status' => $this->mapPermitStatus($permit['PermitStatus'] ?? null),
        ]);

        $this->logSync('vehicle_permit', 'success', 'Vehicle', $vehicle->id, $filters, $response, null, $triggeredBy);
        return true;
    }

    /**
     * Sync all vehicles' ITC permit data.
     */
    public function syncAllVehiclePermits(string $triggeredBy = 'manual'): array
    {
        $vehicles = Vehicle::whereNotNull('plate_number')->get();
        $results = ['success' => 0, 'failed' => 0, 'total' => $vehicles->count()];

        foreach ($vehicles as $vehicle) {
            if ($this->syncVehiclePermit($vehicle, $triggeredBy)) {
                $results['success']++;
            } else {
                $results['failed']++;
            }
        }

        return $results;
    }

    /**
     * Call ITC getDriverPermits API.
     */
    public function getDriverPermits(array $filters = []): ?array
    {
        try {
            $payload = array_filter([
                'EidNo' => $filters['EidNo'] ?? null,
                'TcfNumber' => $filters['TcfNumber'] ?? null,
                'PermitNo' => $filters['PermitNo'] ?? null,
            ]);

            $response = $this->authenticatedRequest('getDriverPermits', $payload);

            if ($response && $response->successful()) {
                return $response->json();
            }

            return null;
        } catch (\Exception $e) {
            Log::error('ITC getDriverPermits failed: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Sync a single driver's ITC permit data.
     */
    public function syncDriverPermit(DriverInfo $driverInfo, string $triggeredBy = 'manual'): bool
    {
        $filters = [];
        if ($driverInfo->emirates_id) {
            $filters['EidNo'] = $driverInfo->emirates_id;
        }
        if ($driverInfo->itc_tcf_number) {
            $filters['TcfNumber'] = $driverInfo->itc_tcf_number;
        }
        if ($driverInfo->itc_permit_number) {
            $filters['PermitNo'] = $driverInfo->itc_permit_number;
        }

        $response = $this->getDriverPermits($filters);

        if (!$response) {
            $this->logSync('driver_permit', 'failed', 'DriverInfo', $driverInfo->id, $filters, $response, 'No response from ITC', $triggeredBy);
            return false;
        }

        // Extract permit data - API returns "Drivers" array
        $permits = $response['Drivers'] ?? $response['drivers'] ?? [];

        if (empty($permits)) {
            $this->logSync('driver_permit', 'failed', 'DriverInfo', $driverInfo->id, $filters, $response, 'No permits found in response', $triggeredBy);
            return false;
        }

        // Use first matching permit
        $permit = is_array($permits) && isset($permits[0]) ? $permits[0] : $permits;

        $driverInfo->update([
            'itc_permit_number' => $this->emptyToNull($permit['PermitNumber'] ?? null),
            'itc_permit_type' => $this->emptyToNull($permit['PermitType'] ?? null),
            'itc_permit_issue_date' => $this->parseDate($permit['PermitIssueDate'] ?? null),
            'itc_permit_expiry_date' => $this->parseDate($permit['PermitExpiryDate'] ?? null),
            'itc_permit_renew_date' => $this->parseDate($permit['PermitRenewDate'] ?? null),
            'itc_operator_type' => $this->emptyToNull($permit['OperatorType'] ?? null),
            'itc_emirates_id_expiry_date' => $this->parseDate($permit['EmiratesIDExiryDate'] ?? $permit['EmiratesIDExpiryDate'] ?? null),
            'itc_driver_name' => $this->emptyToNull($permit['DriverName'] ?? null),
            'itc_date_of_birth' => $this->parseDate($permit['DateofBirth'] ?? $permit['DateOfBirth'] ?? null),
            'itc_nationality' => $this->emptyToNull($permit['Nationality'] ?? null),
            'itc_license_issue_place' => $this->emptyToNull($permit['LicenseIssuePlace'] ?? null),
            'itc_license_expiry_date' => $this->parseDate($permit['LicenseExpiryDate'] ?? null),
            'itc_tcf_number' => $this->emptyToNull($permit['TCFNumber'] ?? $permit['TcfNumber'] ?? null),
            'itc_permit_status' => $this->emptyToNull($permit['PermitStatus'] ?? null),
            'itc_is_eligible_for_trip' => $this->parseYesNo($permit['IsEligibleForTrip'] ?? null),
            'itc_last_status_date' => $this->parseDate($permit['LastStatusDate'] ?? null),
            'itc_remarks' => $this->emptyToNull($permit['Remarks'] ?? null),
            'itc_operator_info' => $permit['OperatorInfo'] ?? null,
            'itc_raw_response' => $permit,
            'itc_last_synced_at' => now(),
            'itc_status' => $this->mapPermitStatus($permit['PermitStatus'] ?? null),
        ]);

        $this->logSync('driver_permit', 'success', 'DriverInfo', $driverInfo->id, $filters, $response, null, $triggeredBy);
        return true;
    }

    /**
     * Sync all drivers' ITC permit data.
     */
    public function syncAllDriverPermits(string $triggeredBy = 'manual'): array
    {
        $driverInfos = DriverInfo::whereNotNull('emirates_id')->get();
        $results = ['success' => 0, 'failed' => 0, 'total' => $driverInfos->count()];

        foreach ($driverInfos as $driverInfo) {
            if ($this->syncDriverPermit($driverInfo, $triggeredBy)) {
                $results['success']++;
            } else {
                $results['failed']++;
            }
        }

        return $results;
    }

    /**
     * Submit trip details to ITC.
     */
    public function saveTripDetails(Booking $booking, string $transactionType = 'New'): bool
    {
        $vehicle = $booking->vehicle;
        $driver = $booking->driver;
        $driverInfo = $driver?->driverInfo;

        if (!$vehicle || !$driver || !$driverInfo) {
            $error = 'Missing required data: ' . implode(', ', array_filter([
                !$vehicle ? 'vehicle' : null,
                !$driver ? 'driver' : null,
                !$driverInfo ? 'driver info' : null,
            ]));

            $booking->update([
                'itc_sync_status' => 'failed',
                'itc_error_log' => $error,
            ]);

            $this->logSync('trip', 'failed', 'Booking', $booking->id, [], null, $error, 'manual');
            return false;
        }

        try {
            $pickupTime = $booking->pickup_time
                ? strtoupper($booking->pickup_time->format('d-M-Y H:i:s'))
                : strtoupper(now()->format('d-M-Y H:i:s'));

            $payload = [
                'TransactionType' => $transactionType,
                'BatchId' => $booking->itc_batch_id ?? '',
                'VehiclePermitNumber' => $vehicle->itc_permit_number ?? '',
                'PlateNumber' => $vehicle->plate_number ?? '',
                'PlateCode' => $vehicle->plate_code ?? '',
                'PlateSource' => $vehicle->itc_plate_source ?? '',
                'CustomerVehicleType' => $vehicle->type ?? '',
                'DriverPermitNumber' => $driverInfo->itc_permit_number ?? '',
                'EmiratesIDNumber' => $driverInfo->emirates_id ?? '',
                'LicenseNumber' => $driverInfo->license_number ?? '',
                'LicenseIssuePlace' => $driverInfo->itc_license_issue_place ?? '',
                'CustomerName' => $booking->customer_name ?? '',
                'CustomerMobileNumber' => $booking->customer_mobile_number ?? '',
                'CustomerEmailId' => $booking->customer_email_id ?? '',
                'TripId' => $booking->trip_id ?? 'TRIP-' . $booking->id,
                'TripType' => $booking->trip_type ?? 'TRANSFER',
                'BookingId' => $booking->booking_id ?? (string) $booking->id,
                'PickupTime' => $pickupTime,
                'PickupLocation' => $booking->pickup_location ?? '',
                'DropOffLocation' => $booking->drop_off_location ?? '',
                'PickupLocationDescription' => $booking->pickup_location_description ?? '',
                'DropOffLocationDescription' => $booking->drop_off_location_description ?? '',
                'Duration' => (string) ($booking->duration ?? '0'),
                'Distance' => (string) ($booking->distance ?? '0'),
                'BaseFare' => (float) ($booking->base_fare ?? 0),
                'DiscountAmount' => (float) ($booking->discount_amount ?? 0),
                'TotalAmount' => (float) ($booking->total_amount ?? 0),
                'TipsAmount' => $booking->tips_amount ? (float) $booking->tips_amount : null,
                'TollFee' => $booking->toll_fee ? (float) $booking->toll_fee : null,
                'Extras' => $booking->extras ? (float) $booking->extras : null,
                'OnContract' => $booking->on_contract ? 1 : 0,
                'ContractProviderName' => $booking->contract_provider_name ?? '',
                'PaymentMode' => $booking->payment_mode ?? 'Cash',
                'VehicleType' => $vehicle->type ?? '',
                'Text1' => $booking->text1 ?? '',
                'Text2' => $booking->text2 ?? '',
                'Text3' => $booking->text3 ?? '',
                'Text4' => $booking->text4 ?? '',
                'Decimal1' => $booking->decimal1 ? (float) $booking->decimal1 : 0.00,
                'Decimal2' => $booking->decimal2 ? (float) $booking->decimal2 : 0.00,
            ];

            $response = $this->authenticatedRequest('saveTripDetails', $payload);

            if (!$response) {
                $booking->update(['itc_sync_status' => 'failed', 'itc_error_log' => 'No response from ITC']);
                $this->logSync('trip', 'failed', 'Booking', $booking->id, $payload, null, 'No response from ITC', 'manual');
                return false;
            }

            $data = $response->json();

            if ($response->successful()) {
                $statusCode = $data['StatusCode'] ?? $data['statusCode'] ?? null;
                $isSuccess = in_array($statusCode, ['Success', 'success']);

                $booking->update([
                    'itc_transaction_type' => $transactionType,
                    'itc_batch_id' => $data['BatchId'] ?? $data['batchId'] ?? null,
                    'itc_status_code' => $statusCode,
                    'itc_status_message' => $data['StatusMessage'] ?? $data['statusMessage'] ?? null,
                    'itc_status_id' => $data['StatusId'] ?? $data['statusId'] ?? null,
                    'itc_sync_status' => $isSuccess ? 'synced' : 'failed',
                    'itc_synced_at' => $isSuccess ? now() : null,
                    'itc_error_log' => $isSuccess ? null : json_encode($data),
                ]);

                $this->logSync('trip', $isSuccess ? 'success' : 'failed', 'Booking', $booking->id, $payload, $data, $isSuccess ? null : ($data['StatusMessage'] ?? 'Unknown error'), 'manual');
                return $isSuccess;
            }

            $booking->update([
                'itc_sync_status' => 'failed',
                'itc_error_log' => 'HTTP ' . $response->status() . ': ' . ($response->body() ?? 'Unknown error'),
            ]);

            $this->logSync('trip', 'failed', 'Booking', $booking->id, $payload, $data, 'HTTP ' . $response->status(), 'manual');
            return false;
        } catch (\Exception $e) {
            $booking->update([
                'itc_sync_status' => 'failed',
                'itc_error_log' => $e->getMessage(),
            ]);

            $this->logSync('trip', 'failed', 'Booking', $booking->id, [], null, $e->getMessage(), 'manual');
            Log::error('ITC saveTripDetails failed: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Map ITC permit status to app status.
     */
    public function mapPermitStatus(?string $itcStatus): string
    {
        if (!$itcStatus) return 'pending';

        $statusMap = [
            'Active' => 'approved',
            'active' => 'approved',
            'ACTIVE' => 'approved',
            'Approved' => 'approved',
            'Suspended' => 'rejected',
            'suspended' => 'rejected',
            'SUSPENDED' => 'rejected',
            'Revoked' => 'rejected',
            'revoked' => 'rejected',
            'REVOKED' => 'rejected',
            'Expired' => 'rejected',
            'expired' => 'rejected',
            'EXPIRED' => 'rejected',
            'Cancelled' => 'rejected',
            'cancelled' => 'rejected',
            'Pending' => 'pending',
            'pending' => 'pending',
            'PENDING' => 'pending',
            'Under Process' => 'pending',
        ];

        return $statusMap[$itcStatus] ?? 'pending';
    }

    /**
     * Log sync operation to database.
     */
    protected function logSync(
        string $syncType,
        string $status,
        ?string $entityType,
        ?int $entityId,
        ?array $requestPayload,
        ?array $responsePayload,
        ?string $errorMessage = null,
        string $triggeredBy = 'system'
    ): void {
        try {
            ItcSyncLog::create([
                'sync_type' => $syncType,
                'status' => $status,
                'entity_type' => $entityType,
                'entity_id' => $entityId,
                'request_payload' => $requestPayload,
                'response_payload' => $responsePayload,
                'error_message' => $errorMessage,
                'triggered_by' => $triggeredBy,
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to write ITC sync log: ' . $e->getMessage());
        }
    }

    /**
     * Parse date from ITC response. Handles dd/MM/yyyy and ISO formats.
     */
    protected function parseDate(?string $date): ?string
    {
        if (!$date || $date === '') return null;

        try {
            // Handle dd/MM/yyyy format (e.g., "15/07/2026")
            if (preg_match('#^\d{2}/\d{2}/\d{4}$#', $date)) {
                return \Carbon\Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d');
            }

            // Handle ISO format (e.g., "2025-07-16T20:43:24.05")
            return \Carbon\Carbon::parse($date)->format('Y-m-d');
        } catch (\Exception $e) {
            return null;
        }
    }

    /**
     * Parse "Yes"/"No" string to boolean.
     */
    protected function parseYesNo(?string $value): ?string
    {
        if ($value === null || $value === '') return null;
        return strtolower($value) === 'yes' ? true : false;
    }

    /**
     * Convert empty string to null.
     */
    protected function emptyToNull(?string $value): ?string
    {
        if ($value === null || $value === '') return null;
        return $value;
    }
}
