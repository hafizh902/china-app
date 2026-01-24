<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SystemConfig extends Model
{
    protected $fillable = [
        'brand_name',
        'brand_logo',
        'footer_address',
        'footer_phone',
        'active_from',
        'active_until',
        'site_closed',
        'tax_percent',
        'delivery_fee',
        'restaurant_lat',
        'restaurant_lng',
        'price_per_km',
    ];

    public function getBrandLogoUrlAttribute(): ?string
    {
        if (! $this->brand_logo) {
            return null;
        }
        return rtrim(config('services.supabase.url'), '/')
            . '/storage/v1/object/public/'
            . config('services.supabase.bucket')
            . '/'
            . $this->brand_logo;
}
}