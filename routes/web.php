<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DriverController as AdminDriverController;
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
Route::post('/add-query', [WebController::class, 'storeQuery'])->name('query.store');
Route::post('/add-lead', [WebController::class, 'storeLead'])->name('lead.store');

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

Route::middleware('auth', 'role:driver')->prefix('driver')->group(function(){
    Route::get('/', [DriverController::class, 'index']);
});

Route::middleware('auth', 'role:admin')->group(function(){
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('driver', AdminDriverController::class);
    Route::resource('vehicle', AdminVehicleController::class);
    Route::resource('lead', LeadController::class);
    Route::resource('query', QueryController::class);

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
