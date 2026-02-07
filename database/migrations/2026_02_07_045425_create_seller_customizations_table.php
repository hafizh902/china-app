<?php
// database/migrations/xxxx_create_seller_customizations_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('seller_customizations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seller_id')->constrained()->cascadeOnDelete();
            
            // Header & Footer
            $table->string('header_title')->nullable();
            $table->text('header_description')->nullable();
            $table->string('favicon')->nullable();
            $table->text('footer_text')->nullable();
            $table->json('social_links')->nullable(); // {facebook, instagram, whatsapp, etc}
            
            // Colors & Branding
            $table->string('primary_color')->default('#4F46E5');
            $table->string('secondary_color')->default('#10B981');
            $table->string('accent_color')->nullable();
            
            // Theme
            $table->enum('theme', ['light', 'dark', 'auto'])->default('light');
            $table->string('font_family')->default('Inter');
            
            // SEO
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->string('og_image')->nullable();
            
            // Custom CSS/JS
            $table->longText('custom_css')->nullable();
            $table->longText('custom_js')->nullable();
            
            // Features Toggle
            $table->boolean('enable_chat')->default(true);
            $table->boolean('enable_reviews')->default(true);
            $table->boolean('enable_reservations')->default(false);
            $table->boolean('enable_ai_description')->default(false);
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('seller_customizations');
    }
};