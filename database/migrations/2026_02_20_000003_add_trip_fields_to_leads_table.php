<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('leads', function (Blueprint $table) {
            // Driver assignment
            $table->unsignedBigInteger('driver_id')->nullable()->after('vehicle_id');
            $table->foreign('driver_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');

            // Contact & trip type
            $table->string('phone')->nullable()->after('email');
            $table->enum('trip_type', ['TRANSFER', 'CHAUFFEUR', 'WALKIN'])->nullable()->after('booking_date');

            // Locations
            $table->string('pickup_location_gps')->nullable()->after('trip_type');
            $table->string('dropoff_location_gps')->nullable()->after('pickup_location_gps');
            $table->string('pickup_location_description')->nullable()->after('dropoff_location_gps');
            $table->string('dropoff_location_description')->nullable()->after('pickup_location_description');
            $table->timestamp('pickup_time')->nullable()->after('dropoff_location_description');

            // Fare details
            $table->decimal('base_fare', 10, 2)->nullable()->after('pickup_time');
            $table->decimal('discount_amount', 10, 2)->nullable()->after('base_fare');
            $table->decimal('total_amount', 10, 2)->nullable()->after('discount_amount');
            $table->decimal('tips_amount', 10, 2)->nullable()->after('total_amount');
            $table->decimal('toll_fee', 10, 2)->nullable()->after('tips_amount');
            $table->decimal('extras', 10, 2)->nullable()->after('toll_fee');

            // Trip metrics
            $table->integer('duration')->nullable()->after('extras');
            $table->decimal('distance', 10, 2)->nullable()->after('duration');

            // Contract
            $table->boolean('on_contract')->default(false)->after('distance');
            $table->string('contract_provider_name')->nullable()->after('on_contract');

            // Payment
            $table->string('payment_mode')->nullable()->after('contract_provider_name');

            // ITC trip sync fields
            $table->string('itc_trip_id')->nullable()->after('payment_mode');
            $table->string('itc_booking_id')->nullable()->after('itc_trip_id');
            $table->string('itc_batch_id')->nullable()->after('itc_booking_id');
            $table->string('itc_transaction_type')->nullable()->after('itc_batch_id');
            $table->string('itc_status_code')->nullable()->after('itc_transaction_type');
            $table->string('itc_status_message')->nullable()->after('itc_status_code');
            $table->string('itc_status_id')->nullable()->after('itc_status_message');
            $table->string('itc_sync_status')->default('pending')->after('itc_status_id');
            $table->timestamp('itc_synced_at')->nullable()->after('itc_sync_status');
            $table->text('itc_error_log')->nullable()->after('itc_synced_at');

            // Lead status
            $table->string('lead_status')->default('new')->after('itc_error_log');
        });
    }

    public function down(): void
    {
        Schema::table('leads', function (Blueprint $table) {
            $table->dropForeign(['driver_id']);
            $table->dropColumn([
                'driver_id',
                'phone',
                'trip_type',
                'pickup_location_gps',
                'dropoff_location_gps',
                'pickup_location_description',
                'dropoff_location_description',
                'pickup_time',
                'base_fare',
                'discount_amount',
                'total_amount',
                'tips_amount',
                'toll_fee',
                'extras',
                'duration',
                'distance',
                'on_contract',
                'contract_provider_name',
                'payment_mode',
                'itc_trip_id',
                'itc_booking_id',
                'itc_batch_id',
                'itc_transaction_type',
                'itc_status_code',
                'itc_status_message',
                'itc_status_id',
                'itc_sync_status',
                'itc_synced_at',
                'itc_error_log',
                'lead_status',
            ]);
        });
    }
};
