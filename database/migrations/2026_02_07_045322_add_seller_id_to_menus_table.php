<?php
// database/migrations/xxxx_add_seller_id_to_menus_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('menus', function (Blueprint $table) {
            $table->foreignId('seller_id')->after('id')->constrained()->cascadeOnDelete();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_featured')->default(false);
            $table->integer('stock')->nullable(); // Optional stock management
            
            $table->index(['seller_id', 'is_available']);
            $table->index(['seller_id', 'category']);
        });
    }

    public function down(): void
    {
        Schema::table('menus', function (Blueprint $table) {
            $table->dropForeign(['seller_id']);
            $table->dropColumn(['seller_id', 'sort_order', 'is_featured', 'stock']);
        });
    }
};