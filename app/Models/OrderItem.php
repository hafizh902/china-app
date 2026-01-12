<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Model untuk menyimpan detail item dalam pesanan
class OrderItem extends Model
{
    use HasFactory;

    // Kolom yang bisa diisi massal
    protected $fillable = [
        'order_id', // ID pesanan
        'menu_id', // ID menu yang dipesan
        'menu_name', // nama menu (snapshot saat pemesanan)
        'price', // harga per item
        'quantity' // jumlah item yang dipesan
    ];

    // Relasi: OrderItem milik satu Order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Relasi: OrderItem milik satu Menu
    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
