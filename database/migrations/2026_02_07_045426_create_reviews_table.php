<?php
// database/migrations/xxxx_create_reviews_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('seller_id')->constrained()->cascadeOnDelete();
            $table->foreignId('order_id')->constrained()->cascadeOnDelete();
            $table->foreignId('menu_id')->nullable()->constrained()->nullOnDelete();
            
            $table->tinyInteger('rating')->unsigned(); // 1-5
            $table->text('comment')->nullable();
            $table->json('images')->nullable(); // Multiple images
            
            // Seller Response
            $table->text('seller_response')->nullable();
            $table->timestamp('responded_at')->nullable();
            
            $table->boolean('is_verified_purchase')->default(true);
            $table->boolean('is_visible')->default(true);
            
            $table->timestamps();
            $table->softDeletes();
            
            $table->index(['seller_id', 'rating']);
            $table->index(['menu_id', 'rating']);
            $table->unique(['user_id', 'order_id']); // One review per order
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};