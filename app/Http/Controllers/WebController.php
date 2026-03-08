<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\Query;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::latest()->limit(3)->get();
        // return $vehicles;
        return view('website.pages.index', compact('vehicles'));
    }
    public function aboutUs()
    {
        return view('website.pages.about-us');
    }
    public function vehicles(Request $request)
    {
        $vehicles = Vehicle::query()
            ->when($request->filled('name'), function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->name . '%');
            })
            ->when($request->filled('seats'), function ($q) use ($request) {
                $q->where('seats', $request->seats);
            })
            ->when($request->filled('type'), function ($q) use ($request) {
                $q->where('type', $request->type);
            })
            ->get();

        return view('website.pages.vehicles', compact('vehicles'));
    }
    public function contactUs()
    {
        return view('website.pages.contact-us');
    }
    public function storeLead(Request $request)
    {
        Lead::create([
            'vehicle_id' => $request->id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'booking_date' => $request->booking_date,
            'lead_status' => 'new',
        ]);

        return redirect()->back()->with('success', 'Booking request has been send successfully.');
    }
    public function storeQuery(Request $request)
    {
        Query::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'Query request has been send successfully.');
    }
}
