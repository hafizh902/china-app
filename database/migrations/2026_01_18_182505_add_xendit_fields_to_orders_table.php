<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('payment_method')->nullable()->after('order_type');
            $table->string('payment_status')->default('pending')->after('payment_method');

            $table->string('xendit_invoice_id')->nullable()->index()->after('payment_status');
            $table->string('xendit_invoice_url')->nullable()->after('xendit_invoice_id');
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn([
                'payment_method',
                'payment_status',
                'xendit_invoice_id',
                'xendit_invoice_url',
            ]);
        });
    }
};
