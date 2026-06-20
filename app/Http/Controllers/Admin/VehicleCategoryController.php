<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pricing;
use App\Models\VehicleCategory;
use Illuminate\Http\Request;

class VehicleCategoryController extends Controller
{
    public function index()
    {
        $categories = VehicleCategory::get();
        return view('admin.pages.vehicle-category.index', compact('categories'));
    }
    public function show($category)
    {
        $category = VehicleCategory::with('vehicles')->findOrFail($category);
        $pricing  = Pricing::where('vehicle_category_id', $category->id)
            ->with('locationFrom', 'locationTo')
            ->get();

        $pricingData = $pricing->map(fn($p) => [
            'id'    => $p->id,
            'from'  => $p->locationFrom?->name ?? '—',
            'to'    => $p->locationTo?->name   ?? '—',
            'price' => (float) $p->price,
        ]);

        return view('admin.pages.vehicle-category.show', compact('category', 'pricing', 'pricingData'));
    }
    public function pricings(VehicleCategory $category)
    {
        $pricing = Pricing::where('vehicle_category_id', $category->id)->with('locationFrom', 'locationTo')->get();
        return view('admin.pages.vehicle-category.show', compact('category', 'pricing'));
    }
    public function savePriceBulk(Request $request)
    {
        $prices = $request->input('prices', []);
        foreach ($prices as $item) {
            Pricing::where('id', $item['id'])->update(['price' => $item['price']]);
        }
        return response()->json(['success' => true]);
    }
}
