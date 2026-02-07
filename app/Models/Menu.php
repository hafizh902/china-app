<?php
// app/Models/Menu.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'seller_id',
        'name',
        'description_ai',
        'description',
        'category',
        'price',
        'image',
        'prep_time_minutes',
        'is_available',
        'sort_order',
        'is_featured',
        'stock',
    ];

    protected $casts = [
        'description_ai' => 'string',
        'is_available' => 'boolean',
        'is_featured' => 'boolean',
    ];

    protected $appends = ['image_url', 'average_rating', 'reviews_count'];

    public function getImageUrlAttribute(): ?string
    {
        if (!$this->image) {
            return null;
        }

        return rtrim(config('services.supabase.url'), '/')
            . '/storage/v1/object/public/'
            . config('services.supabase.bucket')
            . '/'
            . $this->image;
    }

    public function getCategoryLabelAttribute(): string
    {
        return match ($this->category) {
            'main_course' => 'Main Course',
            'snacks' => 'Side Dish',
            'drinks' => 'Drink',
            'desserts' => 'Dessert',
            default => '-',
        };
    }

    public function getAverageRatingAttribute(): float
    {
        return $this->reviews()->avg('rating') ?? 0;
    }

    public function getReviewsCountAttribute(): int
    {
        return $this->reviews()->count();
    }

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function scopeAvailable($query)
    {
        return $query->where('is_available', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeInStock($query)
    {
        return $query->where(function ($q) {
            $q->whereNull('stock')
                ->orWhere('stock', '>', 0);
        });
    }
}