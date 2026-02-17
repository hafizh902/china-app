<?php
// app/Models/Order.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'seller_id',
        'order_number',
        'status',
        'order_type',
        'payment_method',
        'payment_status',
        'xendit_invoice_id',
        'xendit_invoice_url',
        'delivery_address',
        'customer_name',
        'customer_email',
        'customer_phone',
        'special_instructions',
        'subtotal',
        'tax',
        'delivery_fee',
        'total',
        'accepted_at',
        'prepared_at',
        'ready_at',
        'completed_at',
        'cancelled_at',
        'cancellation_reason',
    ];

    protected $casts = [
        'accepted_at' => 'datetime',
        'prepared_at' => 'datetime',
        'ready_at' => 'datetime',
        'completed_at' => 'datetime',
        'cancelled_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function review()
    {
        return $this->hasOne(Review::class);
    }

    public function markAsPaid(): void
    {
        $this->update([
            'payment_status' => 'paid',
            'status' => 'processing',
        ]);
    }

    public function markAsExpired(): void
    {
        $this->update([
            'payment_status' => 'expired',
            'status' => 'cancelled',
            'cancelled_at' => now(),
        ]);
    }

    public function canBeReviewed(): bool
    {
        return $this->status === 'completed' 
            && !$this->review()->exists();
    }
}