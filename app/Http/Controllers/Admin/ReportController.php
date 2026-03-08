<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Expense;
use App\Models\User;
use App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ReportController extends Controller
{
    public function index()
    {
        $drivers = User::role('driver')->get();
        $vehicles = Vehicle::all();
        return view('admin.pages.report.index', compact('drivers', 'vehicles'));
    }

    public function generate(Request $request)
    {
        $request->validate([
            'report_type' => 'required|in:revenue,expense,booking,driver_performance,profit_loss',
            'date_from' => 'nullable|date',
            'date_to' => 'nullable|date|after_or_equal:date_from',
        ]);

        $type = $request->report_type;
        $dateFrom = $request->date_from ? Carbon::parse($request->date_from)->startOfDay() : null;
        $dateTo = $request->date_to ? Carbon::parse($request->date_to)->endOfDay() : null;
        $driverId = $request->driver_id;
        $vehicleId = $request->vehicle_id;
        $category = $request->category;
        $tripType = $request->trip_type;
        $paymentMode = $request->payment_mode;

        $drivers = User::role('driver')->get();
        $vehicles = Vehicle::all();

        $data = match ($type) {
            'revenue' => $this->revenueReport($dateFrom, $dateTo, $driverId, $tripType, $paymentMode),
            'expense' => $this->expenseReport($dateFrom, $dateTo, $driverId, $vehicleId, $category),
            'booking' => $this->bookingReport($dateFrom, $dateTo, $driverId, $tripType, $paymentMode),
            'driver_performance' => $this->driverPerformanceReport($dateFrom, $dateTo, $driverId),
            'profit_loss' => $this->profitLossReport($dateFrom, $dateTo),
        };

        $data['report_type'] = $type;
        $data['filters'] = $request->only(['date_from', 'date_to', 'driver_id', 'vehicle_id', 'category', 'trip_type', 'payment_mode']);

        return view('admin.pages.report.index', array_merge($data, compact('drivers', 'vehicles')));
    }

    public function exportCsv(Request $request)
    {
        $type = $request->report_type;
        $dateFrom = $request->date_from ? Carbon::parse($request->date_from)->startOfDay() : null;
        $dateTo = $request->date_to ? Carbon::parse($request->date_to)->endOfDay() : null;

        $data = match ($type) {
            'revenue' => $this->revenueReport($dateFrom, $dateTo, $request->driver_id, $request->trip_type, $request->payment_mode),
            'expense' => $this->expenseReport($dateFrom, $dateTo, $request->driver_id, $request->vehicle_id, $request->category),
            'booking' => $this->bookingReport($dateFrom, $dateTo, $request->driver_id, $request->trip_type, $request->payment_mode),
            'driver_performance' => $this->driverPerformanceReport($dateFrom, $dateTo, $request->driver_id),
            'profit_loss' => $this->profitLossReport($dateFrom, $dateTo),
            default => ['rows' => collect(), 'headers' => []],
        };

        $filename = $type . '_report_' . now()->format('Y-m-d_His') . '.csv';

        return new StreamedResponse(function () use ($data) {
            $handle = fopen('php://output', 'w');
            // BOM for Excel UTF-8
            fprintf($handle, chr(0xEF) . chr(0xBB) . chr(0xBF));
            fputcsv($handle, $data['headers']);
            foreach ($data['rows'] as $row) {
                fputcsv($handle, $row);
            }
            fclose($handle);
        }, 200, [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ]);
    }

    public function printView(Request $request)
    {
        $type = $request->report_type;
        $dateFrom = $request->date_from ? Carbon::parse($request->date_from)->startOfDay() : null;
        $dateTo = $request->date_to ? Carbon::parse($request->date_to)->endOfDay() : null;

        $data = match ($type) {
            'revenue' => $this->revenueReport($dateFrom, $dateTo, $request->driver_id, $request->trip_type, $request->payment_mode),
            'expense' => $this->expenseReport($dateFrom, $dateTo, $request->driver_id, $request->vehicle_id, $request->category),
            'booking' => $this->bookingReport($dateFrom, $dateTo, $request->driver_id, $request->trip_type, $request->payment_mode),
            'driver_performance' => $this->driverPerformanceReport($dateFrom, $dateTo, $request->driver_id),
            'profit_loss' => $this->profitLossReport($dateFrom, $dateTo),
            default => ['rows' => collect(), 'headers' => [], 'summary' => []],
        };

        $data['report_type'] = $type;
        $data['filters'] = $request->only(['date_from', 'date_to', 'driver_id', 'vehicle_id', 'category', 'trip_type', 'payment_mode']);

        return view('admin.pages.report.print', $data);
    }

    // ─── Report Generators ───

    private function revenueReport($dateFrom, $dateTo, $driverId, $tripType, $paymentMode): array
    {
        $query = Booking::with('driver')
            ->when($dateFrom, fn($q) => $q->where('created_at', '>=', $dateFrom))
            ->when($dateTo, fn($q) => $q->where('created_at', '<=', $dateTo))
            ->when($driverId, fn($q) => $q->where('driver_id', $driverId))
            ->when($tripType, fn($q) => $q->where('trip_type', $tripType))
            ->when($paymentMode, fn($q) => $q->where('payment_mode', $paymentMode))
            ->latest();

        $records = $query->get();

        $summary = [
            'Total Bookings' => $records->count(),
            'Total Revenue' => 'AED ' . number_format($records->sum('total_amount'), 2),
            'Average Per Booking' => 'AED ' . number_format($records->count() > 0 ? $records->sum('total_amount') / $records->count() : 0, 2),
            'Total Base Fare' => 'AED ' . number_format($records->sum('base_fare'), 2),
            'Total Discount' => 'AED ' . number_format($records->sum('discount_amount'), 2),
        ];

        $headers = ['Date', 'Trip ID', 'Driver', 'Trip Type', 'Payment', 'Base Fare', 'Discount', 'Total'];
        $rows = $records->map(fn($b) => [
            $b->created_at->format('d M Y'),
            $b->trip_id,
            $b->driver->name ?? 'N/A',
            $b->trip_type,
            $b->payment_mode,
            number_format($b->base_fare, 2),
            number_format($b->discount_amount, 2),
            number_format($b->total_amount, 2),
        ]);

        return compact('headers', 'rows', 'summary', 'records');
    }

    private function expenseReport($dateFrom, $dateTo, $driverId, $vehicleId, $category): array
    {
        $query = Expense::with(['user', 'vehicle'])
            ->when($dateFrom, fn($q) => $q->where('expense_date', '>=', $dateFrom))
            ->when($dateTo, fn($q) => $q->where('expense_date', '<=', $dateTo))
            ->when($driverId, fn($q) => $q->where('user_id', $driverId))
            ->when($vehicleId, fn($q) => $q->where('vehicle_id', $vehicleId))
            ->when($category, fn($q) => $q->where('category', $category))
            ->latest('expense_date');

        $records = $query->get();

        $byCategory = $records->groupBy('category')->map(fn($g) => $g->sum('amount'));

        $summary = [
            'Total Records' => $records->count(),
            'Total Expenses' => 'AED ' . number_format($records->sum('amount'), 2),
        ];
        foreach ($byCategory as $cat => $total) {
            $summary[ucfirst($cat)] = 'AED ' . number_format($total, 2);
        }

        $headers = ['Date', 'Driver', 'Vehicle', 'Category', 'Amount (AED)', 'Description'];
        $rows = $records->map(fn($e) => [
            $e->expense_date->format('d M Y'),
            $e->user->name ?? 'N/A',
            $e->vehicle->name ?? '-',
            ucfirst($e->category),
            number_format($e->amount, 2),
            $e->description ?? '-',
        ]);

        return compact('headers', 'rows', 'summary', 'records');
    }

    private function bookingReport($dateFrom, $dateTo, $driverId, $tripType, $paymentMode): array
    {
        $query = Booking::with(['driver', 'vehicle'])
            ->when($dateFrom, fn($q) => $q->where('created_at', '>=', $dateFrom))
            ->when($dateTo, fn($q) => $q->where('created_at', '<=', $dateTo))
            ->when($driverId, fn($q) => $q->where('driver_id', $driverId))
            ->when($tripType, fn($q) => $q->where('trip_type', $tripType))
            ->when($paymentMode, fn($q) => $q->where('payment_mode', $paymentMode))
            ->latest();

        $records = $query->get();

        $summary = [
            'Total Bookings' => $records->count(),
            'Cash Bookings' => $records->where('payment_mode', 'Cash')->count(),
            'Card Bookings' => $records->where('payment_mode', 'Card')->count(),
            'On Contract' => $records->where('on_contract', 1)->count(),
            'Total Revenue' => 'AED ' . number_format($records->sum('total_amount'), 2),
            'Total Distance' => number_format($records->sum('distance'), 1) . ' km',
        ];

        $headers = ['Date', 'Trip ID', 'Driver', 'Customer', 'Type', 'Payment', 'Distance', 'Duration', 'Total (AED)', 'ITC Status'];
        $rows = $records->map(fn($b) => [
            $b->created_at->format('d M Y'),
            $b->trip_id,
            $b->driver->name ?? 'N/A',
            $b->customer_name ?? 'N/A',
            $b->trip_type,
            $b->payment_mode,
            $b->distance,
            $b->duration,
            number_format($b->total_amount, 2),
            $b->itc_sync_status ?? 'pending',
        ]);

        return compact('headers', 'rows', 'summary', 'records');
    }

    private function driverPerformanceReport($dateFrom, $dateTo, $driverId): array
    {
        $driversQuery = User::role('driver')
            ->when($driverId, fn($q) => $q->where('id', $driverId));

        $driversList = $driversQuery->get();

        $rows = collect();
        foreach ($driversList as $driver) {
            $bookingsQuery = Booking::where('driver_id', $driver->id)
                ->when($dateFrom, fn($q) => $q->where('created_at', '>=', $dateFrom))
                ->when($dateTo, fn($q) => $q->where('created_at', '<=', $dateTo));

            $expensesQuery = Expense::where('user_id', $driver->id)
                ->when($dateFrom, fn($q) => $q->where('expense_date', '>=', $dateFrom))
                ->when($dateTo, fn($q) => $q->where('expense_date', '<=', $dateTo));

            $totalBookings = $bookingsQuery->count();
            $totalRevenue = $bookingsQuery->sum('total_amount');
            $totalDistance = $bookingsQuery->sum('distance');
            $totalExpenses = $expensesQuery->sum('amount');

            $rows->push([
                $driver->name,
                $driver->email,
                $totalBookings,
                number_format($totalRevenue, 2),
                number_format($totalExpenses, 2),
                number_format($totalRevenue - $totalExpenses, 2),
                number_format($totalDistance, 1),
            ]);
        }

        $summary = [
            'Total Drivers' => $driversList->count(),
            'Total Revenue' => 'AED ' . number_format($rows->sum(fn($r) => (float) str_replace(',', '', $r[3])), 2),
            'Total Expenses' => 'AED ' . number_format($rows->sum(fn($r) => (float) str_replace(',', '', $r[4])), 2),
        ];

        $headers = ['Driver', 'Email', 'Bookings', 'Revenue (AED)', 'Expenses (AED)', 'Net (AED)', 'Distance (km)'];
        $records = $driversList;

        return compact('headers', 'rows', 'summary', 'records');
    }

    private function profitLossReport($dateFrom, $dateTo): array
    {
        // Default to last 12 months if no date range
        if (!$dateFrom) {
            $dateFrom = Carbon::now()->subMonths(11)->startOfMonth();
        }
        if (!$dateTo) {
            $dateTo = Carbon::now()->endOfMonth();
        }

        $rows = collect();
        $current = $dateFrom->copy()->startOfMonth();
        $end = $dateTo->copy()->endOfMonth();

        $grandRevenue = 0;
        $grandExpense = 0;

        while ($current->lte($end)) {
            $monthRevenue = (float) Booking::whereYear('created_at', $current->year)
                ->whereMonth('created_at', $current->month)
                ->sum('total_amount');

            $monthExpense = (float) Expense::whereYear('expense_date', $current->year)
                ->whereMonth('expense_date', $current->month)
                ->sum('amount');

            $net = $monthRevenue - $monthExpense;
            $margin = $monthRevenue > 0 ? ($net / $monthRevenue) * 100 : 0;

            $rows->push([
                $current->format('M Y'),
                number_format($monthRevenue, 2),
                number_format($monthExpense, 2),
                number_format($net, 2),
                number_format($margin, 1) . '%',
            ]);

            $grandRevenue += $monthRevenue;
            $grandExpense += $monthExpense;
            $current->addMonth();
        }

        $summary = [
            'Total Revenue' => 'AED ' . number_format($grandRevenue, 2),
            'Total Expenses' => 'AED ' . number_format($grandExpense, 2),
            'Net Profit/Loss' => 'AED ' . number_format($grandRevenue - $grandExpense, 2),
            'Overall Margin' => $grandRevenue > 0 ? number_format((($grandRevenue - $grandExpense) / $grandRevenue) * 100, 1) . '%' : '0%',
        ];

        $headers = ['Month', 'Revenue (AED)', 'Expenses (AED)', 'Net (AED)', 'Margin'];
        $records = collect();

        return compact('headers', 'rows', 'summary', 'records');
    }
}
