<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            // $table->string('TransactionType');
            $table->string('batch_id')->nullable();
            $table->unsignedBigInteger('vehicle_id');
            $table->foreign('vehicle_id')->on('vehicles')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('driver_id');
            $table->foreign('driver_id')->on('users')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->string('customer_name')->nullable();
            $table->string('customer_mobile_number')->nullable();
            $table->string('customer_email_id')->nullable();
            $table->string('trip_id')->nullable();
            $table->enum('trip_type', ['TRANSFER', 'CHAUFFEUR', 'WALKIN', 'any other']);
            $table->string('booking_id')->nullable();
            $table->dateTime('pickup_time');
            $table->string('pickup_location');
            $table->string('drop_off_location');
            $table->string('pickup_location_description');
            $table->string('drop_off_location_description');
            $table->string('duration');
            $table->string('distance');
            $table->decimal('base_fare')->default(0);
            $table->decimal('discount_amount')->default(0);
            $table->decimal('total_amount')->default(0);
            $table->decimal('tips_amount')->default(0);
            $table->decimal('toll_fee')->default(0);
            $table->decimal('extras')->default(0);
            $table->boolean('on_contract')->default(0);
            $table->string('contract_provider_name')->nullable();
            $table->enum('payment_mode', ['Cash', 'Card']);
            $table->enum('vehicle_type', ['AV', 'UAENATIONAL', 'PHC']);
            $table->string('text1')->nullable();
            $table->string('text2')->nullable();
            $table->string('text3')->nullable();
            $table->string('text4')->nullable();
            $table->decimal('decimal1')->nullable();
            $table->decimal('decimal2')->nullable();
            $table->string('itc_sync_status')->default('pending');
            $table->longText('itc_error_log')->nullable();
            $table->longText('itc_transaction_type')->nullable();
            $table->longText('itc_batch_id')->nullable();
            $table->longText('itc_status_code')->nullable();
            $table->longText('itc_status_message')->nullable();
            $table->longText('itc_status_id')->nullable();
            $table->longText('itc_synced_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
