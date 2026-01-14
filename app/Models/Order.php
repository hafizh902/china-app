<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Model untuk menyimpan data pesanan
class Order extends Model
{
    protected $fillable = [
        'user_id',
        'order_number',
        'status',
        'order_type',
        'delivery_address',
        'customer_name',
        'customer_email',
        'customer_phone',
        'special_instructions',
        'subtotal',
        'tax',
        'delivery_fee',
        'total'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
