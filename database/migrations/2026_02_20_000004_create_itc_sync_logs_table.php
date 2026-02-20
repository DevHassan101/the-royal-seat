<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('itc_sync_logs', function (Blueprint $table) {
            $table->id();
            $table->string('sync_type'); // token, vehicle_permit, driver_permit, trip
            $table->string('status'); // success, failed
            $table->string('entity_type')->nullable(); // Vehicle, DriverInfo, Lead
            $table->unsignedBigInteger('entity_id')->nullable();
            $table->json('request_payload')->nullable();
            $table->json('response_payload')->nullable();
            $table->text('error_message')->nullable();
            $table->string('triggered_by')->default('system'); // system, manual, scheduler
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('itc_sync_logs');
    }
};
