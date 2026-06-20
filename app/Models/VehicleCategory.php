<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleCategory extends Model
{
    use HasFactory;


    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }

    public function pricings()
    {
        return $this->hasMany(Pricing::class);
    }
}
