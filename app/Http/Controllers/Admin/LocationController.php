<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index() {
        $locations = Location::get();
        return view('admin.pages.locations.index', compact('locations'));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'longitude' => 'required|numeric',
            'latitude' => 'required|numeric',
        ]);

        Location::create($request->only('name', 'longitude', 'latitude'));

        return redirect()->route('location.index')->with('success', 'Location added successfully.');
    }

    public function update(Request $request, Location $location) {
        $request->validate([
            'name' => 'required|string|max:255',
            'longitude' => 'required|numeric',
            'latitude' => 'required|numeric',
        ]);

        $location->update($request->only('name', 'longitude', 'latitude'));

        return redirect()->route('location.index')->with('success', 'Location updated successfully.');
    }

    public function destroy(Location $location) {
        $location->delete();
        return redirect()->route('location.index')->with('success', 'Location deleted successfully.');
    }
}
