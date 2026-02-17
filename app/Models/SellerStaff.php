<?php
// app/Models/SellerStaff.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SellerStaff extends Model
{
    protected $table = 'seller_staff';

    protected $fillable = [
        'seller_id',
        'user_id',
        'permissions',
        'is_active',
        'invited_at',
        'accepted_at',
    ];

    protected $casts = [
        'permissions' => 'array',
        'is_active' => 'boolean',
        'invited_at' => 'datetime',
        'accepted_at' => 'datetime',
    ];

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function hasPermission(string $permission): bool
    {
        return in_array($permission, $this->permissions ?? []);
    }
}