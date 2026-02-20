<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('driver_infos', function (Blueprint $table) {
            $table->string('itc_permit_number')->nullable()->after('itc_status');
            $table->string('itc_permit_type')->nullable()->after('itc_permit_number');
            $table->date('itc_permit_issue_date')->nullable()->after('itc_permit_type');
            $table->date('itc_permit_expiry_date')->nullable()->after('itc_permit_issue_date');
            $table->date('itc_permit_renew_date')->nullable()->after('itc_permit_expiry_date');
            $table->string('itc_operator_type')->nullable()->after('itc_permit_renew_date');
            $table->date('itc_emirates_id_expiry_date')->nullable()->after('itc_operator_type');
            $table->string('itc_driver_name')->nullable()->after('itc_emirates_id_expiry_date');
            $table->date('itc_date_of_birth')->nullable()->after('itc_driver_name');
            $table->string('itc_nationality')->nullable()->after('itc_date_of_birth');
            $table->string('itc_license_issue_place')->nullable()->after('itc_nationality');
            $table->date('itc_license_expiry_date')->nullable()->after('itc_license_issue_place');
            $table->string('itc_tcf_number')->nullable()->after('itc_license_expiry_date');
            $table->string('itc_permit_status')->nullable()->after('itc_tcf_number');
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
        Schema::table('driver_infos', function (Blueprint $table) {
            $table->dropColumn([
                'itc_permit_number',
                'itc_permit_type',
                'itc_permit_issue_date',
                'itc_permit_expiry_date',
                'itc_permit_renew_date',
                'itc_operator_type',
                'itc_emirates_id_expiry_date',
                'itc_driver_name',
                'itc_date_of_birth',
                'itc_nationality',
                'itc_license_issue_place',
                'itc_license_expiry_date',
                'itc_tcf_number',
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
