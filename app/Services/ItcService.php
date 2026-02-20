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
     * Call ITC getVehiclePermits API.
     */
    public function getVehiclePermits(array $filters = []): ?array
    {
        $token = $this->getToken();
        if (!$token) return null;

        try {
            $payload = array_filter([
                'Token' => $token,
                'PlateNo' => $filters['PlateNo'] ?? null,
                'ChassisNo' => $filters['ChassisNo'] ?? null,
                'CnNumber' => $filters['CnNumber'] ?? null,
            ]);

            $response = Http::post("{$this->baseUrl}/getVehiclePermits", $payload);

            if ($response->successful()) {
                return $response->json();
            }

            // Token might be expired, retry once
            if ($response->status() === 401) {
                $this->clearTokenCache();
                $token = $this->getToken();
                if (!$token) return null;

                $payload['Token'] = $token;
                $response = Http::post("{$this->baseUrl}/getVehiclePermits", $payload);

                if ($response->successful()) {
                    return $response->json();
                }
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

        // Extract permit data from response
        $permits = $response['VehiclePermits'] ?? $response['vehiclePermits'] ?? $response['Data'] ?? $response['data'] ?? [];

        if (empty($permits)) {
            $this->logSync('vehicle_permit', 'failed', 'Vehicle', $vehicle->id, $filters, $response, 'No permits found in response', $triggeredBy);
            return false;
        }

        // Use first matching permit
        $permit = is_array($permits) && isset($permits[0]) ? $permits[0] : $permits;

        $vehicle->update([
            'itc_permit_number' => $permit['PermitNumber'] ?? $permit['permitNumber'] ?? null,
            'itc_permit_expiry_date' => $this->parseDate($permit['PermitExpiryDate'] ?? $permit['permitExpiryDate'] ?? null),
            'itc_plate_source' => $permit['PlateSource'] ?? $permit['plateSource'] ?? null,
            'itc_insurance_type' => $permit['InsuranceType'] ?? $permit['insuranceType'] ?? null,
            'itc_insurance_provider' => $permit['InsuranceProvider'] ?? $permit['insuranceProvider'] ?? null,
            'itc_insurance_policy_number' => $permit['InsurancePolicyNumber'] ?? $permit['insurancePolicyNumber'] ?? null,
            'itc_registration_expiry_date' => $this->parseDate($permit['RegistrationExpiryDate'] ?? $permit['registrationExpiryDate'] ?? null),
            'itc_operator_type' => $permit['OperatorType'] ?? $permit['operatorType'] ?? null,
            'itc_vehicle_brand' => $permit['VehicleBrand'] ?? $permit['vehicleBrand'] ?? null,
            'itc_vehicle_year' => $permit['VehicleYear'] ?? $permit['vehicleYear'] ?? null,
            'itc_vehicle_model' => $permit['VehicleModel'] ?? $permit['vehicleModel'] ?? null,
            'itc_chassis_number' => $permit['ChassisNumber'] ?? $permit['chassisNumber'] ?? null,
            'itc_permit_status' => $permit['PermitStatus'] ?? $permit['permitStatus'] ?? null,
            'itc_is_eligible_for_trip' => $permit['IsEligibleForTrip'] ?? $permit['isEligibleForTrip'] ?? null,
            'itc_last_status_date' => $this->parseDate($permit['LastStatusDate'] ?? $permit['lastStatusDate'] ?? null),
            'itc_remarks' => $permit['Remarks'] ?? $permit['remarks'] ?? null,
            'itc_operator_info' => $permit['OperatorInfo'] ?? $permit['operatorInfo'] ?? null,
            'itc_raw_response' => $permit,
            'itc_last_synced_at' => now(),
            'itc_status' => $this->mapPermitStatus($permit['PermitStatus'] ?? $permit['permitStatus'] ?? null),
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
        $token = $this->getToken();
        if (!$token) return null;

        try {
            $payload = array_filter([
                'Token' => $token,
                'EidNo' => $filters['EidNo'] ?? null,
                'TcfNumber' => $filters['TcfNumber'] ?? null,
                'PermitNo' => $filters['PermitNo'] ?? null,
            ]);

            $response = Http::post("{$this->baseUrl}/getDriverPermits", $payload);

            if ($response->successful()) {
                return $response->json();
            }

            // Token might be expired, retry once
            if ($response->status() === 401) {
                $this->clearTokenCache();
                $token = $this->getToken();
                if (!$token) return null;

                $payload['Token'] = $token;
                $response = Http::post("{$this->baseUrl}/getDriverPermits", $payload);

                if ($response->successful()) {
                    return $response->json();
                }
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

        // Extract permit data from response
        $permits = $response['DriverPermits'] ?? $response['driverPermits'] ?? $response['Data'] ?? $response['data'] ?? [];

        if (empty($permits)) {
            $this->logSync('driver_permit', 'failed', 'DriverInfo', $driverInfo->id, $filters, $response, 'No permits found in response', $triggeredBy);
            return false;
        }

        // Use first matching permit
        $permit = is_array($permits) && isset($permits[0]) ? $permits[0] : $permits;

        $driverInfo->update([
            'itc_permit_number' => $permit['PermitNumber'] ?? $permit['permitNumber'] ?? null,
            'itc_permit_type' => $permit['PermitType'] ?? $permit['permitType'] ?? null,
            'itc_permit_issue_date' => $this->parseDate($permit['PermitIssueDate'] ?? $permit['permitIssueDate'] ?? null),
            'itc_permit_expiry_date' => $this->parseDate($permit['PermitExpiryDate'] ?? $permit['permitExpiryDate'] ?? null),
            'itc_permit_renew_date' => $this->parseDate($permit['PermitRenewDate'] ?? $permit['permitRenewDate'] ?? null),
            'itc_operator_type' => $permit['OperatorType'] ?? $permit['operatorType'] ?? null,
            'itc_emirates_id_expiry_date' => $this->parseDate($permit['EmiratesIdExpiryDate'] ?? $permit['emiratesIdExpiryDate'] ?? null),
            'itc_driver_name' => $permit['DriverName'] ?? $permit['driverName'] ?? null,
            'itc_date_of_birth' => $this->parseDate($permit['DateOfBirth'] ?? $permit['dateOfBirth'] ?? null),
            'itc_nationality' => $permit['Nationality'] ?? $permit['nationality'] ?? null,
            'itc_license_issue_place' => $permit['LicenseIssuePlace'] ?? $permit['licenseIssuePlace'] ?? null,
            'itc_license_expiry_date' => $this->parseDate($permit['LicenseExpiryDate'] ?? $permit['licenseExpiryDate'] ?? null),
            'itc_tcf_number' => $permit['TcfNumber'] ?? $permit['tcfNumber'] ?? null,
            'itc_permit_status' => $permit['PermitStatus'] ?? $permit['permitStatus'] ?? null,
            'itc_is_eligible_for_trip' => $permit['IsEligibleForTrip'] ?? $permit['isEligibleForTrip'] ?? null,
            'itc_last_status_date' => $this->parseDate($permit['LastStatusDate'] ?? $permit['lastStatusDate'] ?? null),
            'itc_remarks' => $permit['Remarks'] ?? $permit['remarks'] ?? null,
            'itc_operator_info' => $permit['OperatorInfo'] ?? $permit['operatorInfo'] ?? null,
            'itc_raw_response' => $permit,
            'itc_last_synced_at' => now(),
            'itc_status' => $this->mapPermitStatus($permit['PermitStatus'] ?? $permit['permitStatus'] ?? null),
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
        $token = $this->getToken();
        if (!$token) {
            $lead->update([
                'itc_sync_status' => 'failed',
                'itc_error_log' => 'Failed to get ITC token',
            ]);
            return false;
        }

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
                'Token' => $token,
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

            $response = Http::post("{$this->baseUrl}/saveTripDetails", $payload);
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

            // Token might be expired, retry once
            if ($response->status() === 401) {
                $this->clearTokenCache();
                $token = $this->getToken();
                if (!$token) {
                    $lead->update(['itc_sync_status' => 'failed', 'itc_error_log' => 'Token refresh failed']);
                    return false;
                }

                $payload['Token'] = $token;
                $response = Http::post("{$this->baseUrl}/saveTripDetails", $payload);
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

                    $this->logSync('trip', $isSuccess ? 'success' : 'failed', 'Lead', $lead->id, $payload, $data, null, 'manual');
                    return $isSuccess;
                }
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
     * Parse date from ITC response.
     */
    protected function parseDate(?string $date): ?string
    {
        if (!$date) return null;

        try {
            return \Carbon\Carbon::parse($date)->format('Y-m-d');
        } catch (\Exception $e) {
            return null;
        }
    }
}
