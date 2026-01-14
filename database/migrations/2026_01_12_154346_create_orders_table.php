<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  public function up()
{
    Schema::create('orders', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->string('order_number')->unique(); // contoh: ORD-1001
        $table->enum('status', ['pending', 'preparing', 'ready', 'completed', 'cancelled'])->default('pending');
        $table->enum('order_type', ['delivery', 'pickup']);
        $table->text('delivery_address')->nullable(); // hanya untuk delivery
        $table->string('customer_name');
        $table->string('customer_email');
        $table->string('customer_phone');
        $table->text('special_instructions')->nullable();
        $table->decimal('subtotal', 10, 2);
        $table->decimal('tax', 10, 2);
        $table->decimal('delivery_fee', 10, 2)->default(0);
        $table->decimal('total', 10, 2);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
