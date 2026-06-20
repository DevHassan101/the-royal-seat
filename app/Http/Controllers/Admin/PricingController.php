<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\PricingSync;
use App\Models\Location;
use App\Models\Pricing;
use App\Models\VehicleCategory;
use Illuminate\Http\Request;

class PricingController extends Controller
{
    public function index()
    {
        $pricings = Pricing::with(['locationFrom', 'locationTo', 'vehicleCategory'])->get();
        $categories = VehicleCategory::with('pricings')->get();
        return view('admin.pages.pricing.index', compact('pricings', 'categories'));
    }

    public function sync()
    {
        PricingSync::dispatch();
        return redirect()->route('pricing.index')->with('success', 'Pricing data synchronization started.');
    }
}
