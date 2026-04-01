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
        if (!Schema::hasColumn('bookings', 'status')) {
            Schema::table('bookings', function (Blueprint $table) {
                $table->enum('status', ['pending', 'complete', 'cancelled'])->default('pending')->after('itc_synced_at');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('bookings', 'status')) {
            Schema::table('bookings', function (Blueprint $table) {
                $table->dropColumn('status');
            });
        }
    }
};
