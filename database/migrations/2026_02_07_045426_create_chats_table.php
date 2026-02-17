<?php
// database/migrations/xxxx_create_chats_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('chats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete(); // Customer
            $table->foreignId('seller_id')->constrained()->cascadeOnDelete();
            
            $table->string('subject')->nullable();
            $table->enum('status', ['open', 'closed'])->default('open');
            
            // Last message cache for performance
            $table->text('last_message')->nullable();
            $table->timestamp('last_message_at')->nullable();
            $table->foreignId('last_message_by')->nullable()->constrained('users')->nullOnDelete();
            
            // Unread counts
            $table->integer('unread_by_user')->default(0);
            $table->integer('unread_by_seller')->default(0);
            
            $table->timestamps();
            
            $table->index(['user_id', 'seller_id']);
            $table->index(['seller_id', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('chats');
    }
};