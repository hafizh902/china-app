<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    protected $fillable = [
        'number',
        'capacity',
        'position',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
