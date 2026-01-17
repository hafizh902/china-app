<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Model untuk menyimpan data menu makanan
class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'category',
        'price',
        'image',
        'prep_time_minutes',
        'is_available'
    ];

    protected $appends = ['image_url'];

    public function getImageUrlAttribute(): ?string
    {
        if (! $this->image) {
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

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
