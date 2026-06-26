<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Bookings are priced per vehicle category, not per concrete vehicle.
     * Allow a lead to reference only a category, with the vehicle assigned later.
     */
    public function up(): void
    {
        Schema::table('leads', function (Blueprint $table) {
            if (! Schema::hasColumn('leads', 'vehicle_category_id')) {
                $table->unsignedBigInteger('vehicle_category_id')->nullable()->after('vehicle_id');
                $table->foreign('vehicle_category_id')->references('id')->on('vehicle_categories')->nullOnDelete();
            }
        });

        // Make vehicle_id nullable (raw SQL to avoid the doctrine/dbal requirement on Laravel 10).
        DB::statement('ALTER TABLE leads MODIFY vehicle_id BIGINT UNSIGNED NULL');
    }

    public function down(): void
    {
        Schema::table('leads', function (Blueprint $table) {
            if (Schema::hasColumn('leads', 'vehicle_category_id')) {
                $table->dropForeign(['vehicle_category_id']);
                $table->dropColumn('vehicle_category_id');
            }
        });

        DB::statement('ALTER TABLE leads MODIFY vehicle_id BIGINT UNSIGNED NOT NULL');
    }
};
