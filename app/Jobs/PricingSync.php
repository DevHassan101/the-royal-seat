<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Location;
use App\Models\Pricing;
use App\Models\VehicleCategory;

class PricingSync implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        
        $locations = Location::get();
        $categories = VehicleCategory::get();
        foreach ($locations as $from) {
            foreach ($locations as $to) {
                if ($from->id !== $to->id) {
                    foreach ($categories as $category) {
                        Pricing::updateOrCreate(
                            [
                                'location_from_id' => $from->id,
                                'location_to_id' => $to->id,
                                'vehicle_category_id' => $category->id,
                            ],
                            [
                                'price' => 0,
                            ]
                        );
                    }
                }
            }
        }
     
    }
}
