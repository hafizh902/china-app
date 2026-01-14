<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Model untuk menyimpan data menu makanan
class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'category',
        'price',
        'image',
        'prep_time_minutes',
        'is_available'
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
