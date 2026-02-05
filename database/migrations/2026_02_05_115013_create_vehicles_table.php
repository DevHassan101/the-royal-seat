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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('name');
            $table->string('model')->nullable();
            $table->string('seats')->nullable();
            $table->string('type')->nullable();
            $table->decimal('per_day_charges')->nullable();
            $table->enum('transmission', ['automatic', 'manual'])->default('automatic');
            $table->string('plate_number')->nullable();
            $table->string('plate_code')->nullable();
            $table->text('permit_details')->nullable();
            $table->string('itc_status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
