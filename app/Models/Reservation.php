<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'user_id',
        'table_id',
        'reservation_date',
        'reservation_time',
        'dp_amount',
        'status',
        'expires_at'
    ];

    protected $casts = [
        'reservation_date' => 'date',
        'dp_amount' => 'decimal:2',
        'expires_at' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function table()
    {
        return $this->belongsTo(Table::class);
    }
}
