<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('vehicles', function (Blueprint $table) {
            $table->string('itc_permit_number')->nullable()->after('itc_status');
            $table->date('itc_permit_expiry_date')->nullable()->after('itc_permit_number');
            $table->string('itc_plate_source')->nullable()->after('itc_permit_expiry_date');
            $table->string('itc_insurance_type')->nullable()->after('itc_plate_source');
            $table->string('itc_insurance_provider')->nullable()->after('itc_insurance_type');
            $table->string('itc_insurance_policy_number')->nullable()->after('itc_insurance_provider');
            $table->date('itc_registration_expiry_date')->nullable()->after('itc_insurance_policy_number');
            $table->string('itc_operator_type')->nullable()->after('itc_registration_expiry_date');
            $table->string('itc_vehicle_brand')->nullable()->after('itc_operator_type');
            $table->string('itc_vehicle_year')->nullable()->after('itc_vehicle_brand');
            $table->string('itc_vehicle_model')->nullable()->after('itc_vehicle_year');
            $table->string('itc_chassis_number')->nullable()->after('itc_vehicle_model');
            $table->string('itc_permit_status')->nullable()->after('itc_chassis_number');
            $table->boolean('itc_is_eligible_for_trip')->nullable()->after('itc_permit_status');
            $table->date('itc_last_status_date')->nullable()->after('itc_is_eligible_for_trip');
            $table->text('itc_remarks')->nullable()->after('itc_last_status_date');
            $table->json('itc_operator_info')->nullable()->after('itc_remarks');
            $table->json('itc_raw_response')->nullable()->after('itc_operator_info');
            $table->timestamp('itc_last_synced_at')->nullable()->after('itc_raw_response');
        });
    }

    public function down(): void
    {
        Schema::table('vehicles', function (Blueprint $table) {
            $table->dropColumn([
                'itc_permit_number',
                'itc_permit_expiry_date',
                'itc_plate_source',
                'itc_insurance_type',
                'itc_insurance_provider',
                'itc_insurance_policy_number',
                'itc_registration_expiry_date',
                'itc_operator_type',
                'itc_vehicle_brand',
                'itc_vehicle_year',
                'itc_vehicle_model',
                'itc_chassis_number',
                'itc_permit_status',
                'itc_is_eligible_for_trip',
                'itc_last_status_date',
                'itc_remarks',
                'itc_operator_info',
                'itc_raw_response',
                'itc_last_synced_at',
            ]);
        });
    }
};
