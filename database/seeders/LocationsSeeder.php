<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationsSeeder extends Seeder
{
    public function run(): void
    {
        $locations = [
            ['name' => 'Downtown Dubai', 'latitude' => '25.1972', 'longitude' => '55.2744'],
            ['name' => 'Business Bay', 'latitude' => '25.1867', 'longitude' => '55.2635'],
            ['name' => 'Old Dubai (Deira)', 'latitude' => '25.276987', 'longitude' => '55.296249'],
            ['name' => 'Bur Dubai', 'latitude' => '25.2633', 'longitude' => '55.2972'],
            ['name' => 'Karama', 'latitude' => '25.2500', 'longitude' => '55.3000'],
            ['name' => 'Satwa', 'latitude' => '25.2411', 'longitude' => '55.2773'],
            ['name' => 'Dubai International Airport (DXB)', 'latitude' => '25.2532', 'longitude' => '55.3657'],
            ['name' => 'Al Maktoum International Airport (DWC)', 'latitude' => '24.8966', 'longitude' => '55.1614'],
            ['name' => 'Dubai Marina', 'latitude' => '25.0800', 'longitude' => '55.1400'],
            ['name' => 'Jumeirah Beach Residence (JBR)', 'latitude' => '25.0750', 'longitude' => '55.1291'],
            ['name' => 'Palm Jumeirah', 'latitude' => '25.1124', 'longitude' => '55.1390'],
            ['name' => 'Jumeirah', 'latitude' => '25.2048', 'longitude' => '55.2708'],
            ['name' => 'La Mer', 'latitude' => '25.2252', 'longitude' => '55.2568'],
            ['name' => 'Al Barsha', 'latitude' => '25.1123', 'longitude' => '55.2001'],
            ['name' => 'Al Nahda', 'latitude' => '25.2940', 'longitude' => '55.3720'],
            ['name' => 'Mirdif', 'latitude' => '25.2200', 'longitude' => '55.4200'],
            ['name' => 'International City', 'latitude' => '25.1767', 'longitude' => '55.4056'],
            ['name' => 'Dubai Silicon Oasis', 'latitude' => '25.1264', 'longitude' => '55.3866'],
            ['name' => 'Dubai Hills Estate', 'latitude' => '25.0997', 'longitude' => '55.2488'],
            ['name' => 'Arabian Ranches', 'latitude' => '25.0443', 'longitude' => '55.2691'],
            ['name' => 'Discovery Gardens', 'latitude' => '25.0358', 'longitude' => '55.1425'],
            ['name' => 'Jumeirah Village Circle (JVC)', 'latitude' => '25.0600', 'longitude' => '55.2100'],
            ['name' => 'Jumeirah Village Triangle (JVT)', 'latitude' => '25.0400', 'longitude' => '55.1800'],
            ['name' => 'Al Quoz', 'latitude' => '25.1346', 'longitude' => '55.2369'],
            ['name' => 'Dubai Investment Park (DIP)', 'latitude' => '24.9896', 'longitude' => '55.1630'],
            ['name' => 'Jebel Ali Free Zone (JAFZA)', 'latitude' => '24.9850', 'longitude' => '55.0650'],
            ['name' => 'City Walk', 'latitude' => '25.2120', 'longitude' => '55.2650'],
            ['name' => 'Bluewaters Island', 'latitude' => '25.0805', 'longitude' => '55.1200'],
            ['name' => 'Dubai Mall', 'latitude' => '25.1975', 'longitude' => '55.2796'],
            ['name' => 'Burj Khalifa', 'latitude' => '25.1972', 'longitude' => '55.2744'],
            ['name' => 'Dubai Frame', 'latitude' => '25.2355', 'longitude' => '55.3006'],
            ['name' => 'Al Furjan', 'latitude' => '25.0360', 'longitude' => '55.1450'],
            ['name' => 'The Greens', 'latitude' => '25.0930', 'longitude' => '55.1690'],
            ['name' => 'The Springs', 'latitude' => '25.0310', 'longitude' => '55.1770'],
            ['name' => 'The Meadows', 'latitude' => '25.0620', 'longitude' => '55.1650'],
            ['name' => 'Emirates Hills', 'latitude' => '25.0750', 'longitude' => '55.1600'],
            ['name' => 'Dubai Sports City', 'latitude' => '25.0300', 'longitude' => '55.2200'],
            ['name' => 'Motor City', 'latitude' => '25.0450', 'longitude' => '55.2400'],
            ['name' => 'Production City', 'latitude' => '25.0150', 'longitude' => '55.2400'],            
            ['name' => 'Port Rashid', 'latitude' => '25.2697', 'longitude' => '55.2708'],
            ['name' => 'Dubai Creek Harbour', 'latitude' => '25.1970', 'longitude' => '55.3390'],
        ];

        DB::table('locations')->insert($locations);
    }
}