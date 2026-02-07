<?php
// database/migrations/xxxx_create_seller_analytics_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('seller_analytics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seller_id')->constrained()->cascadeOnDelete();
            $table->date('date');
            
            // Traffic
            $table->integer('page_views')->default(0);
            $table->integer('unique_visitors')->default(0);
            
            // Sales
            $table->integer('orders_count')->default(0);
            $table->decimal('revenue', 15, 2)->default(0);
            $table->decimal('average_order_value', 10, 2)->default(0);
            
            // Products
            $table->integer('products_viewed')->default(0);
            $table->integer('cart_additions')->default(0);
            
            // Customer
            $table->integer('new_customers')->default(0);
            $table->integer('returning_customers')->default(0);
            
            // Engagement
            $table->integer('chat_messages')->default(0);
            $table->integer('reviews_count')->default(0);
            $table->decimal('average_rating', 3, 2)->default(0);
            
            $table->timestamps();
            
            $table->unique(['seller_id', 'date']);
            $table->index(['seller_id', 'date']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('seller_analytics');
    }
};