<?php
// database/migrations/xxxx_add_seller_id_to_orders_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->foreignId('seller_id')->after('user_id')->constrained()->cascadeOnDelete();
            
            // Additional tracking
            $table->timestamp('accepted_at')->nullable();
            $table->timestamp('prepared_at')->nullable();
            $table->timestamp('ready_at')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->timestamp('cancelled_at')->nullable();
            $table->text('cancellation_reason')->nullable();
            
            $table->index(['seller_id', 'status']);
            $table->index(['seller_id', 'created_at']);
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['seller_id']);
            $table->dropColumn([
                'seller_id', 'accepted_at', 'prepared_at', 
                'ready_at', 'completed_at', 'cancelled_at', 'cancellation_reason'
            ]);
        });
    }
};