<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Model untuk menyimpan data pesanan
class Order extends Model
{
    use HasFactory;

    // Kolom yang bisa diisi massal
    protected $fillable = [
        'user_id', // ID user yang membuat pesanan
        'order_number', // nomor pesanan unik
        'status', // status pesanan (pending/confirmed/preparing/delivered/cancelled)
        'order_type', // tipe pesanan (dine-in/takeaway/delivery)
        'delivery_address', // alamat pengiriman (untuk delivery)
        'customer_name', // nama pelanggan
        'customer_email', // email pelanggan
        'customer_phone', // nomor telepon pelanggan
        'special_instructions', // instruksi khusus
        'subtotal', // subtotal harga
        'tax', // pajak
        'delivery_fee', // biaya pengiriman
        'total' // total harga
    ];

    // Relasi: Order milik satu User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi: Order memiliki banyak OrderItem
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
