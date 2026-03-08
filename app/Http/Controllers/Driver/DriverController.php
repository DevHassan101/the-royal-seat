<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Expense;
use App\Models\Vehicle;
use App\Services\ItcService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DriverController extends Controller
{
    public function index()
    {
        $driver = Auth::user();
        $vehicleCount = Vehicle::where('user_id', $driver->id)->count();
        $bookingCount = Booking::where('driver_id', $driver->id)->count();
        $expenseCount = Expense::where('user_id', $driver->id)->count();
        $totalExpenses = Expense::where('user_id', $driver->id)->sum('amount');
        $recentBookings = Booking::where('driver_id', $driver->id)->latest()->take(5)->get();

        return view('driver.pages.index', compact('vehicleCount', 'bookingCount', 'expenseCount', 'totalExpenses', 'recentBookings'));
    }

    // ─── Vehicles ───

    public function vehicleIndex()
    {
        $vehicles = Vehicle::where('user_id', Auth::id())->latest()->get();
        return view('driver.pages.vehicle.index', compact('vehicles'));
    }

    public function vehicleCreate()
    {
        return view('driver.pages.vehicle.create');
    }

    public function vehicleStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'picture' => 'required|image',
            'name' => 'required|min:2',
            'type' => 'required|in:AV,UAENATIONAL,PHC',
            'plate_number' => 'required',
            'plate_code' => 'required',
        ], [
            'picture.image' => "The picture field must be a file of type image, ex: .png .jpg .jpeg"
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $image = $request->file('picture');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $image->move('vehicle-images/', $name_gen);

        $vehicle = Vehicle::create([
            'user_id' => Auth::id(),
            'picture' => 'vehicle-images/' . $name_gen,
            'name' => $request->name,
            'model' => $request->model,
            'seats' => $request->seats,
            'type' => $request->type,
            'per_day_charges' => $request->per_day_charges,
            'transmission' => $request->transmission,
            'plate_number' => $request->plate_number,
            'plate_code' => $request->plate_code,
            'permit_details' => $request->permit_details,
        ]);

        try {
            $itcService = app(ItcService::class);
            $itcService->syncVehiclePermit($vehicle, 'auto');
        } catch (\Exception $e) {
            //
        }

        return redirect()->route('driver.vehicle.index')->with('success', 'Vehicle added successfully');
    }

    public function vehicleDestroy(Vehicle $vehicle)
    {
        if ($vehicle->user_id !== Auth::id()) {
            abort(403);
        }

        if ($vehicle->picture && file_exists($vehicle->picture)) {
            unlink($vehicle->picture);
        }
        $vehicle->delete();

        return redirect()->route('driver.vehicle.index')->with('success', 'Vehicle deleted successfully');
    }

    // ─── Bookings ───

    public function bookingIndex()
    {
        $bookings = Booking::where('driver_id', Auth::id())->latest()->get();
        return view('driver.pages.booking.index', compact('bookings'));
    }

    public function bookingCreate()
    {
        $vehicles = Vehicle::where('user_id', Auth::id())->get();
        return view('driver.pages.booking.create', compact('vehicles'));
    }

    public function bookingStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'vehicle' => 'required|exists:vehicles,id',
            'customer_name' => 'nullable|min:3',
            'customer_mobile_number' => 'nullable|min:6',
            'customer_email' => 'nullable|email',
            'trip_id' => 'required',
            'trip_type' => 'required',
            'pickup_time' => 'required|date_format:H:i',
            'pickup_location' => 'required',
            'drop_off_location' => 'required',
            'pickup_location_description' => 'required',
            'drop_off_location_description' => 'required',
            'duration' => 'required|numeric',
            'distance' => 'required|numeric',
            'base_fare' => 'required|numeric',
            'discount_amount' => 'required|numeric',
            'payment_mode' => 'required|in:Cash,Card',
            'on_contract' => 'required|in:0,1',
            'contract_provider_name' => 'required_if:on_contract,1|nullable',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Ensure vehicle belongs to driver
        $vehicle = Vehicle::where('id', $request->vehicle)->where('user_id', Auth::id())->first();
        if (!$vehicle) {
            return redirect()->back()->with('error', 'Invalid vehicle selected')->withInput();
        }

        $booking = Booking::create([
            'driver_id' => Auth::id(),
            'vehicle_id' => $request->vehicle,
            'customer_name' => $request->customer_name,
            'customer_mobile_number' => $request->customer_mobile_number,
            'customer_email_id' => $request->customer_email,
            'trip_id' => $request->trip_id,
            'trip_type' => $request->trip_type,
            'vehicle_type' => $vehicle->type,
            'pickup_time' => Carbon::parse($request->pickup_time),
            'pickup_location' => $request->pickup_location,
            'drop_off_location' => $request->drop_off_location,
            'pickup_location_description' => $request->pickup_location_description,
            'drop_off_location_description' => $request->drop_off_location_description,
            'duration' => $request->duration,
            'distance' => $request->distance,
            'base_fare' => $request->base_fare,
            'discount_amount' => $request->discount_amount,
            'total_amount' => $request->base_fare - $request->discount_amount,
            'payment_mode' => $request->payment_mode,
            'on_contract' => $request->on_contract,
            'contract_provider_name' => $request->on_contract == 1 ? $request->contract_provider_name : null,
        ]);

        try {
            $itcService = app(ItcService::class);
            $itcService->saveTripDetails($booking, 'New');
        } catch (\Exception $e) {
            //
        }

        return redirect()->route('driver.booking.index')->with('success', 'Booking created successfully');
    }

    public function bookingDestroy(Booking $booking)
    {
        if ($booking->driver_id !== Auth::id()) {
            abort(403);
        }

        $booking->delete();
        return redirect()->route('driver.booking.index')->with('success', 'Booking deleted successfully');
    }

    // ─── Expenses ───

    public function expenseIndex()
    {
        $expenses = Expense::where('user_id', Auth::id())->with('vehicle')->latest()->get();
        return view('driver.pages.expense.index', compact('expenses'));
    }

    public function expenseCreate()
    {
        $vehicles = Vehicle::where('user_id', Auth::id())->get();
        return view('driver.pages.expense.create', compact('vehicles'));
    }

    public function expenseStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'vehicle_id' => 'nullable|exists:vehicles,id',
            'category' => 'required|in:fuel,maintenance,insurance,toll,parking,fine,other',
            'amount' => 'required|numeric|min:0.01',
            'description' => 'nullable|string',
            'expense_date' => 'required|date',
            'receipt' => 'nullable|image',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = [
            'user_id' => Auth::id(),
            'vehicle_id' => $request->vehicle_id,
            'category' => $request->category,
            'amount' => $request->amount,
            'description' => $request->description,
            'expense_date' => $request->expense_date,
        ];

        if ($request->hasFile('receipt')) {
            $image = $request->file('receipt');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $image->move('expense-receipts/', $name_gen);
            $data['receipt'] = 'expense-receipts/' . $name_gen;
        }

        Expense::create($data);

        return redirect()->route('driver.expense.index')->with('success', 'Expense added successfully');
    }

    public function expenseDestroy(Expense $expense)
    {
        if ($expense->user_id !== Auth::id()) {
            abort(403);
        }

        if ($expense->receipt && file_exists($expense->receipt)) {
            unlink($expense->receipt);
        }
        $expense->delete();

        return redirect()->route('driver.expense.index')->with('success', 'Expense deleted successfully');
    }
}
