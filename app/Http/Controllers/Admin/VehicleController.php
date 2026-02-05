<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicles = Vehicle::get();
        return view('admin.pages.vehicle.index', compact('vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::get();
        return view('admin.pages.vehicle.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user' => 'required|exists:users,id',
            'name' => 'required|min:2',
            'plate_number' => 'required',
            'plate_code' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        Vehicle::create([
            'user_id' => $request->user,
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
        return redirect()
            ->route('vehicle.index')
            ->with('success', 'Vehicle created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $vehicle = Vehicle::findOrFail($id);
        return view('admin.pages.vehicle.show', compact('vehicle'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users = User::get();
        $vehicle = Vehicle::findOrFail($id);
        return view('admin.pages.vehicle.edit', compact('vehicle', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'user' => 'required|exists:users,id',
            'name' => 'required|min:2',
            'plate_number' => 'required',
            'plate_code' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        Vehicle::findOrFail($id)->update([
            'user_id' => $request->user,
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
        return redirect()
            ->route('vehicle.index')
            ->with('success', 'Vehicle updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Vehicle::findOrFail($id)->delete();
        return redirect()
            ->route('vehicle.index')
            ->with('success', 'Vehicle deleted successfully');
    }
}
