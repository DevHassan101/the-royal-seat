<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DriverInfo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DriverController extends Controller
{
    public function index()
    {
        $drivers = User::role('driver')->with('driverInfo')->get();
        return view('admin.pages.driver.index', compact('drivers'));
    }

    public function create()
    {
        return view('admin.pages.driver.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'            => 'required|string|max:255',
            'email'           => 'required|email|unique:users,email',
            'password'        => 'required|min:6',
            'emirates_id'     => 'required|unique:driver_infos,emirates_id',
            'license_number'  => 'required|unique:driver_infos,license_number',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole('driver');

        DriverInfo::create([
            'user_id'        => $user->id,
            'emirates_id'    => $request->emirates_id,
            'license_number' => $request->license_number,
            'permit_details' => $request->permit_details,
        ]);

        return redirect()
            ->route('driver.index')
            ->with('success', 'Driver created successfully');
    }

    public function show(User $driver)
    {
        return view('admin.pages.driver.show', compact('driver'));
    }

    public function edit(User $driver)
    {
        return view('admin.pages.driver.edit', compact('driver'));
    }

    public function update(Request $request, User $driver)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $driver->id,
            'password'        => 'nullable|min:6',
            'emirates_id'     => 'required|unique:driver_infos,emirates_id,'.$driver->driverInfo?->id,
            'license_number'  => 'required|unique:driver_infos,license_number,'.$driver->driverInfo?->id,
        ]);

        $driver->update([
            'name'  => $request->name,
            'email' => $request->email,
        ]);

        $driver->driverInfo->update([
            'emirates_id'    => $request->emirates_id,
            'license_number' => $request->license_number,
            'permit_details' => $request->permit_details,
        ]);

        return redirect()
            ->route('driver.index')
            ->with('success', 'Driver updated successfully');
    }

    public function destroy(User $driver)
    {
        $driver->delete();

        return redirect()
            ->back()
            ->with('success', 'Driver deleted successfully');
    }
}
