<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Comfort',
            'Business',
            'SUV',
            'EX-SUV',
            'VIP',
            'Mini Van/Bus'            
        ];

        foreach ($categories as $category) {
            \App\Models\VehicleCategory::create(['name' => $category]);
        }
    }
}
