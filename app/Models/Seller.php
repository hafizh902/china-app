<?php
// app/Models/Seller.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Seller extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'business_name',
        'slug',
        'description',
        'logo',
        'business_email',
        'business_phone',
        'business_address',
        'latitude',
        'longitude',
        'status',
        'is_verified',
        'verified_at',
        'business_hours',
        'is_open',
        'timezone',
    ];

    protected $casts = [
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8',
        'is_verified' => 'boolean',
        'verified_at' => 'datetime',
        'business_hours' => 'array',
        'is_open' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($seller) {
            if (!$seller->slug) {
                $seller->slug = Str::slug($seller->business_name);
            }
        });
    }

    public function getLogoUrlAttribute(): ?string
    {
        if (!$this->logo) {
            return null;
        }

        return rtrim(config('services.supabase.url'), '/')
            . '/storage/v1/object/public/'
            . config('services.supabase.bucket')
            . '/'
            . $this->logo;
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    // Relations
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function customization()
    {
        return $this->hasOne(SellerCustomization::class);
    }

    public function subscription()
    {
        return $this->hasOne(SellerSubscription::class);
    }

    public function staff()
    {
        return $this->hasMany(SellerStaff::class);
    }

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function tables()
    {
        return $this->hasMany(Table::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function banners()
    {
        return $this->hasMany(Banner::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function chats()
    {
        return $this->hasMany(Chat::class);
    }

    public function analytics()
    {
        return $this->hasMany(SellerAnalytic::class);
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeVerified($query)
    {
        return $query->where('is_verified', true);
    }
}