<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\Query;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index() {
        $vehicles = Vehicle::latest()->limit(3)->get();
        // return $vehicles;
        return view('website.pages.index', compact('vehicles'));
    }
    public function aboutUs() {
        return view('website.pages.about-us');
    }
    public function vehicles() {
        return view('website.pages.vehicles');
    }
    public function contactUs() {
        return view('website.pages.contact-us');
    }
    public function storeLead(Request $request) {
        Lead::create([
            'vehicle_id' => $request->id,
            'name' => $request->name,
            'email' => $request->email,
            'booking_date' => $request->booking_date,
        ]);

        return redirect()->back()->with('success','Booking request has been send successfully.');
    }
    public function storeQuery(Request $request) {
        Query::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success','Query request has been send successfully.');
    }
}
