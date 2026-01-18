<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('system_configs', function (Blueprint $table) {
            $table->id();

            // Page Settings
            $table->string('brand_name')->default('Default Brand');
            $table->string('brand_logo')->nullable();
            $table->text('footer_address')->nullable();
            $table->string('footer_phone')->nullable();

            // Operational Settings
            $table->time('active_from')->nullable();
            $table->time('active_until')->nullable();
            $table->boolean('site_closed')->default(false);
            $table->unsignedTinyInteger('tax_percent')->default(0);
            $table->unsignedInteger('delivery_fee')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('system_configs');
    }
};
