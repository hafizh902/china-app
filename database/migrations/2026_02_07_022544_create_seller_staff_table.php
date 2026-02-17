<?php
// database/migrations/xxxx_create_seller_staff_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('seller_staff', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seller_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            
            // Permissions
            $table->json('permissions')->nullable(); // ['manage_orders', 'manage_menu', 'view_analytics', 'manage_chat']
            
            $table->boolean('is_active')->default(true);
            $table->timestamp('invited_at')->nullable();
            $table->timestamp('accepted_at')->nullable();
            
            $table->timestamps();
            
            $table->unique(['seller_id', 'user_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('seller_staff');
    }
};