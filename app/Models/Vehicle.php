<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $casts = [
        'itc_permit_expiry_date' => 'date',
        'itc_registration_expiry_date' => 'date',
        'itc_last_status_date' => 'date',
        'itc_is_eligible_for_trip' => 'boolean',
        'itc_operator_info' => 'array',
        'itc_raw_response' => 'array',
        'itc_last_synced_at' => 'datetime',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function leads()
    {
        return $this->hasMany(Lead::class);
    }
}
