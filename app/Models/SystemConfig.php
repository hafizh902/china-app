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
    ];
}
