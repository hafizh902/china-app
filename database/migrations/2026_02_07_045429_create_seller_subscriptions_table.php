<?php
// database/migrations/xxxx_create_seller_subscriptions_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('seller_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seller_id')->constrained()->cascadeOnDelete();
            
            // Features enabled by admin
            $table->boolean('ai_enabled')->default(false);
            $table->boolean('reservations_enabled')->default(false);
            $table->boolean('analytics_advanced')->default(false);
            $table->boolean('custom_domain')->default(false);
            $table->boolean('priority_support')->default(false);
            
            // Limits
            $table->integer('max_products')->default(50);
            $table->integer('max_staff')->default(2);
            $table->integer('max_banners')->default(3);
            
            // Subscription
            $table->enum('plan', ['free', 'basic', 'pro', 'enterprise'])->default('free');
            $table->timestamp('expires_at')->nullable();
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('seller_subscriptions');
    }
};