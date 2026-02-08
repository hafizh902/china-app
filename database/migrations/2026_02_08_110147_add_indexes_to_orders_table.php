<?php 

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            // Add composite index for filtering by user and status
            // This speeds up queries like: WHERE user_id = X AND status = 'completed'
            $table->index(['user_id', 'status'], 'idx_user_status');
            
            // Add composite index for filtering by user and date
            // This speeds up queries like: WHERE user_id = X AND created_at BETWEEN ...
            $table->index(['user_id', 'created_at'], 'idx_user_created');
            
            // Add index on created_at for date-based queries
            $table->index('created_at', 'idx_created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropIndex('idx_user_status');
            $table->dropIndex('idx_user_created');
            $table->dropIndex('idx_created_at');
        });
    }
};
