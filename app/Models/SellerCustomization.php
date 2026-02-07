<?php
// app/Models/SellerCustomization.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SellerCustomization extends Model
{
    protected $fillable = [
        'seller_id',
        'header_title',
        'header_description',
        'favicon',
        'footer_text',
        'social_links',
        'primary_color',
        'secondary_color',
        'accent_color',
        'theme',
        'font_family',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'og_image',
        'custom_css',
        'custom_js',
        'enable_chat',
        'enable_reviews',
        'enable_reservations',
        'enable_ai_description',
    ];

    protected $casts = [
        'social_links' => 'array',
        'enable_chat' => 'boolean',
        'enable_reviews' => 'boolean',
        'enable_reservations' => 'boolean',
        'enable_ai_description' => 'boolean',
    ];

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    public function getFaviconUrlAttribute(): ?string
    {
        if (!$this->favicon) {
            return null;
        }

        return rtrim(config('services.supabase.url'), '/')
            . '/storage/v1/object/public/'
            . config('services.supabase.bucket')
            . '/'
            . $this->favicon;
    }

    public function getOgImageUrlAttribute(): ?string
    {
        if (!$this->og_image) {
            return null;
        }

        return rtrim(config('services.supabase.url'), '/')
            . '/storage/v1/object/public/'
            . config('services.supabase.bucket')
            . '/'
            . $this->og_image;
    }
}