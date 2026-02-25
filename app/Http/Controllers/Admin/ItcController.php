<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DriverInfo;
use App\Models\ItcSyncLog;
use App\Models\Lead;
use App\Models\Vehicle;
use App\Services\ItcService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ItcController extends Controller
{
    protected ItcService $itcService;

    public function __construct(ItcService $itcService)
    {
        $this->itcService = $itcService;
    }

    public function index()
    {
        $stats = [
            'total_vehicles' => Vehicle::count(),
            'synced_vehicles' => Vehicle::whereNotNull('itc_last_synced_at')->count(),
            'approved_vehicles' => Vehicle::where('itc_status', 'approved')->count(),
            'total_drivers' => DriverInfo::count(),
            'synced_drivers' => DriverInfo::whereNotNull('itc_last_synced_at')->count(),
            'approved_drivers' => DriverInfo::where('itc_status', 'approved')->count(),
            'total_leads' => Lead::count(),
            'synced_trips' => Lead::where('itc_sync_status', 'synced')->count(),
            'failed_trips' => Lead::where('itc_sync_status', 'failed')->count(),
        ];

        $recentLogs = ItcSyncLog::latest()->limit(10)->get();

        return view('admin.pages.itc.index', compact('stats', 'recentLogs'));
    }

    public function syncAllVehicles()
    {
        $results = $this->itcService->syncAllVehiclePermits('manual');

        return redirect()->back()->with('success',
            "Vehicle sync complete: {$results['success']}/{$results['total']} succeeded, {$results['failed']} failed."
        );
    }

    public function syncVehicle(Vehicle $vehicle)
    {
        $success = $this->itcService->syncVehiclePermit($vehicle, 'manual');

        return redirect()->back()->with(
            $success ? 'success' : 'error',
            $success ? 'Vehicle ITC data synced successfully.' : 'Failed to sync vehicle ITC data. Check sync logs for details.'
        );
    }

    public function syncAllDrivers()
    {
        $results = $this->itcService->syncAllDriverPermits('manual');
        Log::info($results);

        return redirect()->back()->with('success',
            "Driver sync complete: {$results['success']}/{$results['total']} succeeded, {$results['failed']} failed."
        );
    }

    public function syncDriver(DriverInfo $driverInfo)
    {
        $success = $this->itcService->syncDriverPermit($driverInfo, 'manual');

        return redirect()->back()->with(
            $success ? 'success' : 'error',
            $success ? 'Driver ITC data synced successfully.' : 'Failed to sync driver ITC data. Check sync logs for details.'
        );
    }

    public function submitTrip(Lead $lead)
    {
        $transactionType = $lead->itc_sync_status === 'synced' ? 'UPDATE' : 'NEW';
        $success = $this->itcService->saveTripDetails($lead, $transactionType);

        return redirect()->back()->with(
            $success ? 'success' : 'error',
            $success ? 'Trip submitted to ITC successfully.' : 'Failed to submit trip to ITC. Check sync logs for details.'
        );
    }

    public function logs(Request $request)
    {
        $query = ItcSyncLog::latest();

        if ($request->filled('sync_type')) {
            $query->where('sync_type', $request->sync_type);
        }
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        if ($request->filled('triggered_by')) {
            $query->where('triggered_by', $request->triggered_by);
        }

        $logs = $query->paginate(20)->appends($request->query());

        return view('admin.pages.itc.logs', compact('logs'));
    }
}
