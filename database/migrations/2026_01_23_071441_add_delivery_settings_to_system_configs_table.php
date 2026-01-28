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
        Schema::table('system_configs', function (Blueprint $table) {
            $table->decimal('restaurant_lat', 10, 8)->default(-6.200000); // Contoh Lat Jakarta
            $table->decimal('restaurant_lng', 11, 8)->default(106.816666); // Contoh Lng Jakarta
            $table->integer('price_per_km')->default(5000); // Harga per KM
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('system_configs', function (Blueprint $table) {
            //
        });
    }
};
