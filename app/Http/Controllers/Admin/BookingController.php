<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\User;
use App\Models\Vehicle;
use App\Services\ItcService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::get();
        return view('admin.pages.booking.index', compact('bookings'));
    }

    public function create()
    {
        $drivers = User::role('driver')->get();
        $vehicles = Vehicle::get();
        return view('admin.pages.booking.create', compact('drivers', 'vehicles'));
    }

    public function show($bookingId)
    {
        $booking = Booking::findOrFail($bookingId);
        return view('admin.pages.booking.show', compact('booking'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'driver'                             => 'required|exists:users,id',
            'vehicle'                            => 'required|exists:vehicles,id',
            'customer_name'                      => 'nullable|min:3',
            'customer_mobile_number'             => 'nullable|min:6',
            'customer_email'                  => 'nullable|email',
            'trip_id'                            => 'required',
            'trip_type'                          => 'required',
            'pickup_time'                        => 'required|date_format:H:i',
            'pickup_location'                    => 'required',
            'drop_off_location'                  => 'required',
            'pickup_location_description'        => 'required',
            'drop_off_location_description'      => 'required',
            'duration'                           => 'required|numeric',
            'distance'                           => 'required|numeric',
            'base_fare'                          => 'required|numeric',
            'discount_amount'                    => 'required|numeric',
            'payment_mode'                       => 'required|in:Cash,Card',
            'on_contract'                        => 'required|in:0,1',
            'contract_provider_name'             => 'required_if:on_contract,1|nullable',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $selectedVehicle = Vehicle::findOrFail($request->vehicle);

        $booking = Booking::create([
            'driver_id'                          => $request->driver,
            'vehicle_id'                         => $request->vehicle,
            'customer_name'                      => $request->customer_name,
            'customer_mobile_number'             => $request->customer_mobile_number,
            'customer_email_id'                  => $request->customer_email,
            'trip_id'                            => $request->trip_id,
            'trip_type'                          => $request->trip_type,
            'vehicle_type'                       => $selectedVehicle->type,
            'pickup_time'                        => Carbon::parse($request->pickup_time),
            'pickup_location'                    => $request->pickup_location,
            'drop_off_location'                  => $request->drop_off_location,
            'pickup_location_description'        => $request->pickup_location_description,
            'drop_off_location_description'      => $request->drop_off_location_description,
            'duration'                           => $request->duration,
            'distance'                           => $request->distance,
            'base_fare'                          => $request->base_fare,
            'discount_amount'                    => $request->discount_amount,
            'total_amount'                       => $request->base_fare - $request->discount_amount,
            'payment_mode'                       => $request->payment_mode,
            'on_contract'                        => $request->on_contract,
            'contract_provider_name'             => $request->on_contract == 1 ? $request->contract_provider_name : null,
        ]);
        // Auto sync ITC data for new driver
        try {
            $itcService = app(ItcService::class);
            $itcService->saveTripDetails($booking, 'New');
        } catch (\Exception $e) {
            // ITC sync failure should not block driver creation
        }

        return redirect()
            ->route('booking.index')
            ->with('success', 'Booking created successfully');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()
            ->back()
            ->with('success', 'Booking deleted successfully');
    }
}
