<?php
// app/Models/SellerSubscription.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SellerSubscription extends Model
{
    protected $fillable = [
        'seller_id',
        'ai_enabled',
        'reservations_enabled',
        'analytics_advanced',
        'custom_domain',
        'priority_support',
        'max_products',
        'max_staff',
        'max_banners',
        'plan',
        'expires_at',
    ];

    protected $casts = [
        'ai_enabled' => 'boolean',
        'reservations_enabled' => 'boolean',
        'analytics_advanced' => 'boolean',
        'custom_domain' => 'boolean',
        'priority_support' => 'boolean',
        'expires_at' => 'datetime',
    ];

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    public function isActive(): bool
    {
        return !$this->expires_at || $this->expires_at->isFuture();
    }

    public function canAddProduct(): bool
    {
        return $this->seller->menus()->count() < $this->max_products;
    }

    public function canAddStaff(): bool
    {
        return $this->seller->staff()->count() < $this->max_staff;
    }

    public function canAddBanner(): bool
    {
        return $this->seller->banners()->count() < $this->max_banners;
    }
}