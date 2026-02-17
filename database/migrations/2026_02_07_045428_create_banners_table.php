<?php
// database/migrations/xxxx_create_banners_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seller_id')->constrained()->cascadeOnDelete();
            
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('image');
            $table->enum('type', ['horizontal', 'vertical']); // horizontal = banner youtube style, vertical = promo sidebar
            $table->string('link_url')->nullable();
            $table->string('button_text')->nullable();
            
            // Display settings
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
            
            // Analytics
            $table->integer('click_count')->default(0);
            $table->integer('view_count')->default(0);
            
            $table->timestamps();
            $table->softDeletes();
            
            $table->index(['seller_id', 'is_active']);
            $table->index(['seller_id', 'type']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};