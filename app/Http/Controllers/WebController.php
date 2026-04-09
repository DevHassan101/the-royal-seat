<?php

namespace App\Http\Controllers;

use App\Mail\LeadNotificationMail;
use App\Mail\NewQueryMail;
use App\Models\Lead;
use App\Models\Query;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        $lead = Lead::create([
            'vehicle_id' => $request->id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'booking_date' => $request->booking_date,
            'lead_status' => 'new',
        ]);

        $admin = User::role('admin')->first();
        if ($admin) {
            Mail::to($admin->email)->send(new LeadNotificationMail($lead));
        }

        return redirect()->back()->with('success', 'Booking request has been send successfully.');
    }
    public function storeQuery(Request $request)
    {
        $query = Query::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);
            Mail::to("support@royalseatluxury.com")->send(new NewQueryMail($query));

        return redirect()->back()->with('success', 'Query request has been send successfully.');
    }
}
