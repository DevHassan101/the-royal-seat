<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverInfo extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $casts = [
        'itc_permit_issue_date' => 'date',
        'itc_permit_expiry_date' => 'date',
        'itc_permit_renew_date' => 'date',
        'itc_emirates_id_expiry_date' => 'date',
        'itc_date_of_birth' => 'date',
        'itc_license_expiry_date' => 'date',
        'itc_last_status_date' => 'date',
        'itc_is_eligible_for_trip' => 'boolean',
        'itc_operator_info' => 'array',
        'itc_raw_response' => 'array',
        'itc_last_synced_at' => 'datetime',
    ];

    public function driver()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
