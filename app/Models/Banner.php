<?php
// app/Models/Banner.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'seller_id',
        'title',
        'description',
        'image',
        'type',
        'link_url',
        'button_text',
        'sort_order',
        'is_active',
        'start_date',
        'end_date',
        'click_count',
        'view_count',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

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

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true)
            ->where(function ($q) {
                $q->whereNull('start_date')
                    ->orWhere('start_date', '<=', now());
            })
            ->where(function ($q) {
                $q->whereNull('end_date')
                    ->orWhere('end_date', '>=', now());
            });
    }

    public function scopeHorizontal($query)
    {
        return $query->where('type', 'horizontal');
    }

    public function scopeVertical($query)
    {
        return $query->where('type', 'vertical');
    }

    public function incrementViews()
    {
        $this->increment('view_count');
    }

    public function incrementClicks()
    {
        $this->increment('click_count');
    }
}