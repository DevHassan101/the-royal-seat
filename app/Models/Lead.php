<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $casts = [
        'booking_date' => 'date',
        'pickup_time' => 'datetime',
        'base_fare' => 'decimal:2',
        'discount_amount' => 'decimal:2',
        'total_amount' => 'decimal:2',
        'tips_amount' => 'decimal:2',
        'toll_fee' => 'decimal:2',
        'extras' => 'decimal:2',
        'distance' => 'decimal:2',
        'on_contract' => 'boolean',
        'itc_synced_at' => 'datetime',
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function assignedDriver()
    {
        return $this->belongsTo(User::class, 'driver_id');
    }
}
