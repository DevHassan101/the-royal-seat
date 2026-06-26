<?php

namespace App\Http\Controllers;

use App\Mail\LeadNotificationMail;
use App\Mail\NewQueryMail;
use App\Models\Lead;
use App\Models\Location;
use App\Models\Pricing;
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
    public function myBookings()
    {
        return view('website.pages.my-bookings');
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
    public function bookARide(Request $request)
    {

        $pickupLocationId = session('pickup_location_id');
        $dropoffLocationId = session('dropoff_location_id');

        // Every category the admin has priced (price > 0) for this exact route.
        $pricings = Pricing::where('location_from_id', $pickupLocationId)
            ->where('location_to_id', $dropoffLocationId)
            ->where('price', '>', 0)
            ->with(['vehicleCategory.vehicles'])
            ->get();

        // Shape each priced category into the option the booking view expects.
        // Booking is category-based; a concrete vehicle (for the photo / specs) is
        // just a representative pick from that category and may not exist yet.
        $options = $pricings->map(function (Pricing $p) {
            $vehicles = $p->vehicleCategory?->vehicles ?? collect();
            $vehicle  = $vehicles->first();

            // Up to 4 vehicle photos for the card's image slider.
            $images = $vehicles
                ->filter(fn($v) => filled($v->picture))
                ->take(4)
                ->map(fn($v) => [
                    'src'  => asset($v->picture),
                    'name' => $v->model ?: $v->name,
                ])
                ->values();

            return [
                'category_id'  => $p->vehicle_category_id,
                'vehicle_id'   => $vehicle?->id,
                'category'     => $p->vehicleCategory?->name ?? '—',
                'model'        => $vehicle?->model,
                'price'        => (float) $p->price,
                'seats'        => $vehicle?->seats,
                'type'         => $vehicle?->type,
                'transmission' => $vehicle?->transmission,
                'image'        => $images->first()['src'] ?? null,
                'images'       => $images->all(),
            ];
        })->values();

        $from = Location::find($pickupLocationId);
        $to = Location::find($dropoffLocationId);
        $bookingDate = session('date');
        $bookingTime = session('time');


        return view('website.pages.book-a-ride', [
            'from'        => $from,
            'to'          => $to,
            'options'     => $options,
            'bookingDate' => $bookingDate,
            'bookingTime' => $bookingTime,
            'passengers'  => (int) $request->query('passengers', 1),
        ]);
    }
    /**
     * Typeahead for the pickup field: returns locations that are the origin of
     * at least one route which the admin has actually priced (price > 0).
     */
    public function searchLocations(Request $request)
    {
        $term = trim((string) $request->query('q', ''));

        $pickupIds = Pricing::where('price', '>', 0)
            ->distinct()
            ->pluck('location_from_id');

        $locations = Location::whereIn('id', $pickupIds)
            ->when($term !== '', fn($q) => $q->where('name', 'like', '%' . $term . '%'))
            ->orderBy('name')
            ->limit(10)
            ->get(['id', 'name']);

        return response()->json($locations);
    }

    /**
     * Returns the drop-off locations reachable from the selected pickup for
     * which the admin has set a price (price > 0).
     */
    public function dropoffLocations(Request $request)
    {
        $pickupId = $request->query('pickup_id');

        if (! $pickupId) {
            return response()->json([]);
        }

        $dropoffIds = Pricing::where('location_from_id', $pickupId)
            ->where('price', '>', 0)
            ->distinct()
            ->pluck('location_to_id');

        $locations = Location::whereIn('id', $dropoffIds)
            ->orderBy('name')
            ->get(['id', 'name']);

        return response()->json($locations);
    }

    public function storeLead(Request $request)
    {
        $validated = $request->validate([
            'vehicle_category_id' => ['required', 'exists:vehicle_categories,id'],
            'vehicle_id'   => ['nullable', 'exists:vehicles,id'],
            'name'         => ['required', 'string', 'max:255'],
            'email'        => ['nullable', 'email'],
            'phone'        => ['nullable', 'string', 'max:30'],
            'booking_date' => ['nullable', 'date'],
            'pickup_time'  => ['nullable', 'date'],
            'pickup_location_description'  => ['nullable', 'string', 'max:255'],
            'dropoff_location_description' => ['nullable', 'string', 'max:255'],
            'base_fare'    => ['nullable', 'numeric', 'min:0'],
            'tips_amount'  => ['nullable', 'numeric', 'min:0'],
            'total_amount' => ['nullable', 'numeric', 'min:0'],
            'payment_mode' => ['nullable', 'string', 'max:50'],
        ]);

        $lead = Lead::create(array_merge($validated, [
            'trip_type'   => 'TRANSFER',
            'lead_status' => 'new',
        ]));

        try {
            $admin = User::role('admin')->first();
            if ($admin) {
                Mail::to($admin->email)->send(new LeadNotificationMail($lead));
            }
        } catch (\Throwable $e) {
            // Booking is already saved; don't fail the request if the mail server is down.
            report($e);
        }

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success'    => true,
                'message'    => 'Booking request has been sent successfully.',
                'booking_id' => 'RS-' . now()->format('Y') . '-' . str_pad($lead->id, 4, '0', STR_PAD_LEFT),
            ]);
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



    public function startBooking(Request $request)
    {
        try {
            $pickupLocation = Location::findOrFail($request->pickup_location)->name;
            $dropoffLocation = Location::findOrFail($request->dropoff_location)->name;
            session([
                'pickup_location' => $pickupLocation,
                'dropoff_location' => $dropoffLocation,
                'pickup_location_id' => $request->pickup_location,
                'dropoff_location_id' => $request->dropoff_location,
                'date' => $request->date,
                'time' => $request->time,
            ]);
            return redirect('book-a-ride');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
