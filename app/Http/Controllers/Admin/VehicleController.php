<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Vehicle;
use App\Services\ItcService;
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
            'driver' => 'required|exists:users,id',
            'picture' => 'required|image',
            'name' => 'required|min:2',
            'plate_number' => 'required',
            'plate_code' => 'required'
        ], [
            'picture.image' => "The picture field must be a file of type image, ex: .png .jpg .jpeg"
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $image = $request->file('picture');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $image->move('vehicle-images/', $name_gen);

        $vehicle = Vehicle::create([
            'user_id' => $request->driver,
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

        // Auto sync ITC data for new vehicle
        try {
            $itcService = app(ItcService::class);
            $itcService->syncVehiclePermit($vehicle, 'auto');
        } catch (\Exception $e) {
            // ITC sync failure should not block vehicle creation
        }

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
            'driver' => 'required|exists:users,id',
            'picture' => 'nullable|image',
            'name' => 'required|min:2',
            'plate_number' => 'required',
            'plate_code' => 'required',
            'model' => 'nullable|string',
            'seats' => 'nullable|integer',
            'type' => 'nullable|string',
            'per_day_charges' => 'nullable|numeric',
            'transmission' => 'nullable|string',
            'permit_details' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $vehicle = Vehicle::findOrFail($id);
        $vehicle->update([
            'user_id' => $request->driver,
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

        if ($request->hasFile('picture')) {

            if ($vehicle->picture && file_exists($vehicle->picture)) {
                unlink($vehicle->picture);
            }

            $image = $request->file('picture');
            $name_gen = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move('vehicle-images/', $name_gen);

            $vehicle->update([
                'picture' => 'vehicle-images/' . $name_gen,
            ]);
        }

        return redirect()
            ->route('vehicle.index')
            ->with('success', 'Vehicle updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vehicle = Vehicle::findOrFail($id);
        if ($vehicle->picture && file_exists($vehicle->picture)) {
            unlink($vehicle->picture);
        }
        $vehicle->delete();
        return redirect()
            ->route('vehicle.index')
            ->with('success', 'Vehicle deleted successfully');
    }
}
