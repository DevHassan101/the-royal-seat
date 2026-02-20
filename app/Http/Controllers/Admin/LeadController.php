<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function index()
    {
        $leads = Lead::with(['vehicle', 'assignedDriver'])->get();
        return view('admin.pages.lead.index', compact('leads'));
    }

    public function show(Lead $lead)
    {
        $lead->load(['vehicle', 'assignedDriver.driverInfo']);
        return view('admin.pages.lead.show', compact('lead'));
    }

    public function edit(Lead $lead)
    {
        $lead->load(['vehicle', 'assignedDriver']);
        $drivers = User::role('driver')->with('driverInfo')->get();
        $vehicles = Vehicle::all();
        return view('admin.pages.lead.edit', compact('lead', 'drivers', 'vehicles'));
    }

    public function update(Request $request, Lead $lead)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:20',
            'vehicle_id' => 'required|exists:vehicles,id',
            'driver_id' => 'nullable|exists:users,id',
            'trip_type' => 'nullable|in:TRANSFER,CHAUFFEUR,WALKIN',
            'pickup_location_gps' => 'nullable|string',
            'dropoff_location_gps' => 'nullable|string',
            'pickup_location_description' => 'nullable|string',
            'dropoff_location_description' => 'nullable|string',
            'pickup_time' => 'nullable|date',
            'base_fare' => 'nullable|numeric|min:0',
            'discount_amount' => 'nullable|numeric|min:0',
            'total_amount' => 'nullable|numeric|min:0',
            'tips_amount' => 'nullable|numeric|min:0',
            'toll_fee' => 'nullable|numeric|min:0',
            'extras' => 'nullable|numeric|min:0',
            'duration' => 'nullable|integer|min:0',
            'distance' => 'nullable|numeric|min:0',
            'on_contract' => 'nullable|boolean',
            'contract_provider_name' => 'nullable|string',
            'payment_mode' => 'nullable|string',
            'lead_status' => 'nullable|string',
        ]);

        $lead->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'vehicle_id' => $request->vehicle_id,
            'driver_id' => $request->driver_id,
            'booking_date' => $request->booking_date,
            'trip_type' => $request->trip_type,
            'pickup_location_gps' => $request->pickup_location_gps,
            'dropoff_location_gps' => $request->dropoff_location_gps,
            'pickup_location_description' => $request->pickup_location_description,
            'dropoff_location_description' => $request->dropoff_location_description,
            'pickup_time' => $request->pickup_time,
            'base_fare' => $request->base_fare,
            'discount_amount' => $request->discount_amount,
            'total_amount' => $request->total_amount,
            'tips_amount' => $request->tips_amount,
            'toll_fee' => $request->toll_fee,
            'extras' => $request->extras,
            'duration' => $request->duration,
            'distance' => $request->distance,
            'on_contract' => $request->has('on_contract'),
            'contract_provider_name' => $request->contract_provider_name,
            'payment_mode' => $request->payment_mode,
            'lead_status' => $request->lead_status,
        ]);

        return redirect()
            ->route('lead.show', $lead)
            ->with('success', 'Lead updated successfully');
    }

    public function destroy(Lead $lead)
    {
        $lead->delete();

        return redirect()
            ->back()
            ->with('success', 'Lead deleted successfully');
    }
}
