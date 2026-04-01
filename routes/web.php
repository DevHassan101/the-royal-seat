<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\DriverController as AdminDriverController;
use App\Http\Controllers\Admin\ExpenseController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\LeadController;
use App\Http\Controllers\Admin\QueryController;
use App\Http\Controllers\Admin\ItcController;
use App\Http\Controllers\Admin\VehicleController as AdminVehicleController;
use App\Http\Controllers\Driver\DriverController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [WebController::class, 'index']);
Route::get('/about-us', [WebController::class, 'aboutUs']);
Route::get('/vehicles', [WebController::class, 'vehicles']);
Route::get('/contact-us', [WebController::class, 'contactUs']);
Route::post('/add-query', [WebController::class, 'storeQuery'])->name('query.save');
Route::post('/add-lead', [WebController::class, 'storeLead'])->name('lead.save');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    Route::get('users', [UserController::class, 'index'])->name('users.index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth', 'role:driver')->prefix('driver')->name('driver.')->group(function(){
    Route::get('/dashboard', [DriverController::class, 'index'])->name('dashboard');

    // Vehicles
    Route::get('/vehicles', [DriverController::class, 'vehicleIndex'])->name('vehicle.index');
    Route::get('/vehicles/create', [DriverController::class, 'vehicleCreate'])->name('vehicle.create');
    Route::post('/vehicles', [DriverController::class, 'vehicleStore'])->name('vehicle.store');
    Route::delete('/vehicles/{vehicle}', [DriverController::class, 'vehicleDestroy'])->name('vehicle.destroy');

    // Bookings
    Route::get('/bookings', [DriverController::class, 'bookingIndex'])->name('booking.index');
    Route::get('/bookings/create', [DriverController::class, 'bookingCreate'])->name('booking.create');
    Route::post('/bookings', [DriverController::class, 'bookingStore'])->name('booking.store');
    Route::patch('/bookings/{booking}/complete', [DriverController::class, 'bookingComplete'])->name('booking.complete');
    Route::delete('/bookings/{booking}', [DriverController::class, 'bookingDestroy'])->name('booking.destroy');

    // Expenses
    Route::get('/expenses', [DriverController::class, 'expenseIndex'])->name('expense.index');
    Route::get('/expenses/create', [DriverController::class, 'expenseCreate'])->name('expense.create');
    Route::post('/expenses', [DriverController::class, 'expenseStore'])->name('expense.store');
    Route::delete('/expenses/{expense}', [DriverController::class, 'expenseDestroy'])->name('expense.destroy');
});

Route::middleware('auth', 'role:admin')->group(function(){
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('driver', AdminDriverController::class);
    Route::resource('vehicle', AdminVehicleController::class);
    Route::resource('lead', LeadController::class);
    Route::patch('lead/{lead}/status', [LeadController::class, 'updateStatus'])->name('lead.update-status');
    Route::resource('query', QueryController::class);
    Route::resource('booking', BookingController::class);
    Route::patch('booking/{booking}/cancel', [BookingController::class, 'cancel'])->name('booking.cancel');
    Route::resource('expense', ExpenseController::class)->only(['index', 'create', 'store', 'destroy']);

    // Reports
    Route::get('reports', [ReportController::class, 'index'])->name('report.index');
    Route::post('reports/generate', [ReportController::class, 'generate'])->name('report.generate');
    Route::post('reports/export-csv', [ReportController::class, 'exportCsv'])->name('report.export-csv');
    Route::post('reports/print', [ReportController::class, 'printView'])->name('report.print');

    // ITC Integration Routes
    Route::get('itc', [ItcController::class, 'index'])->name('itc.index');
    Route::post('itc/sync-all-vehicles', [ItcController::class, 'syncAllVehicles'])->name('itc.sync-all-vehicles');
    Route::post('itc/sync-vehicle/{vehicle}', [ItcController::class, 'syncVehicle'])->name('itc.sync-vehicle');
    Route::post('itc/sync-all-drivers', [ItcController::class, 'syncAllDrivers'])->name('itc.sync-all-drivers');
    Route::post('itc/sync-driver/{driverInfo}', [ItcController::class, 'syncDriver'])->name('itc.sync-driver');
    Route::post('itc/submit-trip/{lead}', [ItcController::class, 'submitTrip'])->name('itc.submit-trip');
    Route::get('itc/logs', [ItcController::class, 'logs'])->name('itc.logs');
});

require __DIR__.'/auth.php';
