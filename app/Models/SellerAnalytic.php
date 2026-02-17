<?php
// app/Models/SellerAnalytic.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SellerAnalytic extends Model
{
    protected $fillable = [
        'seller_id',
        'date',
        'page_views',
        'unique_visitors',
        'orders_count',
        'revenue',
        'average_order_value',
        'products_viewed',
        'cart_additions',
        'new_customers',
        'returning_customers',
        'chat_messages',
        'reviews_count',
        'average_rating',
    ];

    protected $casts = [
        'date' => 'date',
        'revenue' => 'decimal:2',
        'average_order_value' => 'decimal:2',
        'average_rating' => 'decimal:2',
    ];

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }
}