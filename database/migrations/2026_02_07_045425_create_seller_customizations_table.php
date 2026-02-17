<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('seller_customizations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seller_id')->constrained()->onDelete('cascade');
            
            // Hero Section
            $table->string('hero_background_image')->nullable();
            $table->string('hero_title')->default('Temukan Produk');
            $table->string('hero_subtitle')->default('Favorit Anda Disini.');
            $table->text('hero_description')->nullable();
            $table->string('hero_cta_text')->default('Belanja Sekarang');
            $table->string('hero_secondary_cta_text')->default('Pelajari Lebih Lanjut');
            $table->string('hero_overlay_opacity')->default('95'); // 0-100
            
            // Store Badge
            $table->string('store_badge_text')->nullable(); // Jika null, pakai nama toko
            $table->boolean('show_store_badge')->default(true);
            
            // Features Section
            $table->boolean('show_features_section')->default(true);
            $table->json('features')->nullable(); // Array of features
            
            // Catalog Section
            $table->string('catalog_title')->default('Produk Unggulan');
            $table->string('catalog_subtitle')->default('Pilihan Pelanggan');
            $table->integer('catalog_product_limit')->default(4);
            $table->boolean('show_catalog_section')->default(true);
            
            // Custom Sections (untuk section tambahan)
            $table->json('custom_sections')->nullable();
            
            // SEO & Meta
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('og_image')->nullable();
            $table->string('favicon')->nullable();
            
            // Design & Theme
            $table->string('primary_color')->default('#4F46E5'); // Indigo-600
            $table->string('secondary_color')->default('#06B6D4'); // Cyan-500
            $table->string('accent_color')->default('#10B981'); // Emerald-500
            $table->string('theme')->default('modern'); // modern, minimal, bold
            $table->string('font_family')->default('default'); // default, serif, mono
            
            // Footer
            $table->text('footer_text')->nullable();
            $table->json('social_links')->nullable(); // {facebook: url, instagram: url, etc}
            
            // Advanced
            $table->text('custom_css')->nullable();
            $table->text('custom_js')->nullable();
            
            // Feature Toggles
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