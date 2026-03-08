<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Expense;
use App\Models\User;
use App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        // Summary stats
        $totalRevenue = Booking::sum('total_amount');
        $totalExpenses = Expense::sum('amount');
        $netProfit = $totalRevenue - $totalExpenses;
        $totalBookings = Booking::count();
        $totalDrivers = User::role('driver')->count();
        $totalVehicles = Vehicle::count();

        // Monthly revenue & expenses for chart (last 12 months)
        $months = collect();
        for ($i = 11; $i >= 0; $i--) {
            $months->push(Carbon::now()->subMonths($i));
        }

        $monthLabels = $months->map(fn($m) => $m->format('M Y'))->values();

        $monthlyRevenue = $months->map(function ($month) {
            return (float) Booking::whereYear('created_at', $month->year)
                ->whereMonth('created_at', $month->month)
                ->sum('total_amount');
        })->values();

        $monthlyExpenses = $months->map(function ($month) {
            return (float) Expense::whereYear('expense_date', $month->year)
                ->whereMonth('expense_date', $month->month)
                ->sum('amount');
        })->values();

        // Bookings by trip type
        $tripTypes = Booking::select('trip_type', DB::raw('count(*) as count'))
            ->groupBy('trip_type')
            ->pluck('count', 'trip_type');

        // Payment mode distribution
        $paymentModes = Booking::select('payment_mode', DB::raw('count(*) as count'))
            ->groupBy('payment_mode')
            ->pluck('count', 'payment_mode');

        // Expense by category
        $expenseCategories = Expense::select('category', DB::raw('SUM(amount) as total'))
            ->groupBy('category')
            ->pluck('total', 'category');

        // Top 5 drivers by revenue
        $topDrivers = Booking::select('driver_id', DB::raw('SUM(total_amount) as revenue'))
            ->groupBy('driver_id')
            ->orderByDesc('revenue')
            ->take(5)
            ->with('driver')
            ->get();

        // Recent bookings
        $recentBookings = Booking::with('driver')->latest()->take(5)->get();

        return view('admin.pages.index', compact(
            'totalRevenue', 'totalExpenses', 'netProfit', 'totalBookings',
            'totalDrivers', 'totalVehicles', 'monthLabels', 'monthlyRevenue',
            'monthlyExpenses', 'tripTypes', 'paymentModes', 'expenseCategories',
            'topDrivers', 'recentBookings'
        ));
    }
}
