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
        Schema::create('pricings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('location_from_id');
            $table->foreign('location_from_id')->references('id')->on('locations')->onDelete('cascade');
            $table->unsignedBigInteger('location_to_id');
            $table->foreign('location_to_id')->references('id')->on('locations')->onDelete('cascade');
            $table->unsignedBigInteger('vehicle_category_id');
            $table->foreign('vehicle_category_id')->references('id')->on('vehicle_categories')->onDelete('cascade');
            $table->decimal('price', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pricings');
    }
};
