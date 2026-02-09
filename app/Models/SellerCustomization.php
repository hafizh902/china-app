<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SellerCustomization extends Model
{
    protected $fillable = [
        'seller_id',
        
        // Hero Section
        'hero_background_image',
        'hero_title',
        'hero_subtitle',
        'hero_description',
        'hero_cta_text',
        'hero_secondary_cta_text',
        'hero_overlay_opacity',
        'store_badge_text',
        'show_store_badge',
        
        // Features
        'show_features_section',
        'features',
        
        // Catalog
        'catalog_title',
        'catalog_subtitle',
        'catalog_product_limit',
        'show_catalog_section',
        
        // Custom Sections
        'custom_sections',
        
        // SEO
        'meta_title',
        'meta_description',
        'meta_keywords',
        'og_image',
        'favicon',
        
        // Design
        'primary_color',
        'secondary_color',
        'accent_color',
        'theme',
        'font_family',
        
        // Footer
        'footer_text',
        'social_links',
        
        // Advanced
        'custom_css',
        'custom_js',
        
        // Features
        'enable_chat',
        'enable_reviews',
        'enable_reservations',
        'enable_ai_description',
    ];

    protected $casts = [
        'features' => 'array',
        'custom_sections' => 'array',
        'social_links' => 'array',
        'show_store_badge' => 'boolean',
        'show_features_section' => 'boolean',
        'show_catalog_section' => 'boolean',
        'enable_chat' => 'boolean',
        'enable_reviews' => 'boolean',
        'enable_reservations' => 'boolean',
        'enable_ai_description' => 'boolean',
    ];

    // Relationships
    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    // URL Accessors
    public function getHeroBackgroundUrlAttribute(): ?string
    {
        return $this->getFileUrl($this->hero_background_image);
    }

    public function getFaviconUrlAttribute(): ?string
    {
        return $this->getFileUrl($this->favicon);
    }

    public function getOgImageUrlAttribute(): ?string
    {
        return $this->getFileUrl($this->og_image);
    }

    private function getFileUrl(?string $path): ?string
    {
        if (!$path) {
            return null;
        }

        return rtrim(config('services.supabase.url'), '/')
            . '/storage/v1/object/public/'
            . config('services.supabase.bucket')
            . '/'
            . $path;
    }

    // Helper Methods
    public function getHeroData(): array
    {
        return [
            'background_url' => $this->hero_background_url,
            'title' => $this->hero_title ?? 'Temukan Produk',
            'subtitle' => $this->hero_subtitle ?? 'Favorit Anda Disini.',
            'description' => $this->hero_description,
            'cta_text' => $this->hero_cta_text ?? 'Belanja Sekarang',
            'secondary_cta_text' => $this->hero_secondary_cta_text ?? 'Pelajari Lebih Lanjut',
            'overlay_opacity' => $this->hero_overlay_opacity ?? 95,
            'show_badge' => $this->show_store_badge,
            'badge_text' => $this->store_badge_text ?? $this->seller->name ?? 'Official Store',
        ];
    }

    public function getFeaturesData(): array
    {
        return [
            'show' => $this->show_features_section,
            'items' => $this->features ?? [],
        ];
    }

    public function getCatalogData(): array
    {
        return [
            'show' => $this->show_catalog_section,
            'title' => $this->catalog_title ?? 'Produk Unggulan',
            'subtitle' => $this->catalog_subtitle ?? 'Pilihan Pelanggan',
            'limit' => $this->catalog_product_limit ?? 4,
        ];
    }

    public function getThemeColors(): array
    {
        return [
            'primary' => $this->primary_color ?? '#4F46E5',
            'secondary' => $this->secondary_color ?? '#06B6D4',
            'accent' => $this->accent_color ?? '#10B981',
        ];
    }

    public function getSocialLinksArray(): array
    {
        return array_filter($this->social_links ?? [], function($link) {
            return !empty($link);
        });
    }

    public function hasCustomSections(): bool
    {
        return !empty($this->custom_sections);
    }

    // Static helper to get customization for current seller
    public static function forCurrentSeller(): ?self
    {
        $sellerId = auth()->user()->seller_id ?? null;
        
        if (!$sellerId) {
            return null;
        }

        return static::firstOrCreate(
            ['seller_id' => $sellerId],
            [
                'hero_title' => 'Temukan Produk',
                'hero_subtitle' => 'Favorit Anda Disini.',
                'primary_color' => '#4F46E5',
                'secondary_color' => '#06B6D4',
                'accent_color' => '#10B981',
            ]
        );
    }

    // Generate CSS variables from theme colors
    public function generateCssVariables(): string
    {
        $colors = $this->getThemeColors();
        
        return "
            :root {
                --color-primary: {$colors['primary']};
                --color-secondary: {$colors['secondary']};
                --color-accent: {$colors['accent']};
            }
        ";
    }
}