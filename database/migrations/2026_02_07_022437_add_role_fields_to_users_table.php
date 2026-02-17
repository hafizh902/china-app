<?php
// database/migrations/xxxx_add_role_fields_to_users_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Ubah role menjadi enum dengan opsi lebih banyak
            $table->enum('role', ['user', 'seller', 'staff', 'admin'])->default('user')->change();
            
            // Tambah seller_id untuk staff
            $table->foreignId('seller_id')->nullable()->constrained('users')->nullOnDelete();
            
            // Additional fields
            $table->string('phone')->nullable();
            $table->string('avatar')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamp('last_login_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['seller_id']);
            $table->dropColumn(['seller_id', 'phone', 'avatar', 'is_active', 'last_login_at']);
        });
    }
};