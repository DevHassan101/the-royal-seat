<?php

namespace App\Services;

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
    public function saveTripDetails(Lead $lead, string $transactionType = 'NEW'): bool
    {
        $vehicle = $lead->vehicle;
        $driver = $lead->assignedDriver;
        $driverInfo = $driver?->driverInfo;

        if (!$vehicle || !$driver || !$driverInfo) {
            $error = 'Missing required data: ' . implode(', ', array_filter([
                !$vehicle ? 'vehicle' : null,
                !$driver ? 'driver' : null,
                !$driverInfo ? 'driver info' : null,
            ]));

            $lead->update([
                'itc_sync_status' => 'failed',
                'itc_error_log' => $error,
            ]);

            $this->logSync('trip', 'failed', 'Lead', $lead->id, [], null, $error, 'manual');
            return false;
        }

        try {
            $payload = [
                'TransactionType' => $transactionType,
                'TripDetails' => [
                    'BookingId' => $lead->itc_booking_id ?? (string) $lead->id,
                    'TripId' => $lead->itc_trip_id ?? 'TRIP-' . $lead->id,
                    'TripType' => $lead->trip_type ?? 'TRANSFER',
                    'VehiclePlateNo' => $vehicle->plate_number,
                    'VehiclePlateCode' => $vehicle->plate_code,
                    'DriverPermitNo' => $driverInfo->itc_permit_number ?? '',
                    'DriverEidNo' => $driverInfo->emirates_id,
                    'PassengerName' => $lead->name,
                    'PassengerPhone' => $lead->phone ?? '',
                    'PickupLocationGps' => $lead->pickup_location_gps ?? '',
                    'DropoffLocationGps' => $lead->dropoff_location_gps ?? '',
                    'PickupLocationDescription' => $lead->pickup_location_description ?? '',
                    'DropoffLocationDescription' => $lead->dropoff_location_description ?? '',
                    'PickupTime' => $lead->pickup_time ? $lead->pickup_time->format('Y-m-d H:i:s') : now()->format('Y-m-d H:i:s'),
                    'BaseFare' => (float) ($lead->base_fare ?? 0),
                    'DiscountAmount' => (float) ($lead->discount_amount ?? 0),
                    'TotalAmount' => (float) ($lead->total_amount ?? 0),
                    'TipsAmount' => (float) ($lead->tips_amount ?? 0),
                    'TollFee' => (float) ($lead->toll_fee ?? 0),
                    'Extras' => (float) ($lead->extras ?? 0),
                    'Duration' => (int) ($lead->duration ?? 0),
                    'Distance' => (float) ($lead->distance ?? 0),
                    'OnContract' => $lead->on_contract ? 'Yes' : 'No',
                    'ContractProviderName' => $lead->contract_provider_name ?? '',
                    'PaymentMode' => $lead->payment_mode ?? 'Cash',
                ],
            ];

            $response = $this->authenticatedRequest('saveTripDetails', $payload);

            if (!$response) {
                $lead->update(['itc_sync_status' => 'failed', 'itc_error_log' => 'No response from ITC']);
                $this->logSync('trip', 'failed', 'Lead', $lead->id, $payload, null, 'No response from ITC', 'manual');
                return false;
            }

            $data = $response->json();

            if ($response->successful()) {
                $statusCode = $data['StatusCode'] ?? $data['statusCode'] ?? null;
                $isSuccess = in_array($statusCode, ['200', '201', 200, 201, 'Success', 'success']);

                $lead->update([
                    'itc_transaction_type' => $transactionType,
                    'itc_batch_id' => $data['BatchId'] ?? $data['batchId'] ?? null,
                    'itc_status_code' => $statusCode,
                    'itc_status_message' => $data['StatusMessage'] ?? $data['statusMessage'] ?? null,
                    'itc_status_id' => $data['StatusId'] ?? $data['statusId'] ?? null,
                    'itc_sync_status' => $isSuccess ? 'synced' : 'failed',
                    'itc_synced_at' => $isSuccess ? now() : null,
                    'itc_error_log' => $isSuccess ? null : json_encode($data),
                ]);

                $this->logSync('trip', $isSuccess ? 'success' : 'failed', 'Lead', $lead->id, $payload, $data, $isSuccess ? null : ($data['StatusMessage'] ?? 'Unknown error'), 'manual');
                return $isSuccess;
            }

            $lead->update([
                'itc_sync_status' => 'failed',
                'itc_error_log' => 'HTTP ' . $response->status() . ': ' . ($response->body() ?? 'Unknown error'),
            ]);

            $this->logSync('trip', 'failed', 'Lead', $lead->id, $payload, $data, 'HTTP ' . $response->status(), 'manual');
            return false;
        } catch (\Exception $e) {
            $lead->update([
                'itc_sync_status' => 'failed',
                'itc_error_log' => $e->getMessage(),
            ]);

            $this->logSync('trip', 'failed', 'Lead', $lead->id, [], null, $e->getMessage(), 'manual');
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
