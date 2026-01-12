<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Model untuk menyimpan data menu makanan
class Menu extends Model
{
    use HasFactory;

    // Kolom yang bisa diisi massal
    protected $fillable = [
        'name', // nama menu
        'description', // deskripsi menu
        'category', // kategori menu (makanan/minuman)
        'price', // harga menu
        'image', // path gambar menu
        'is_available' // status ketersediaan menu
    ];

    // Relasi: Menu memiliki banyak OrderItem
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
