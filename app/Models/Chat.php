<?php
// app/Models/Chat.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillable = [
        'user_id',
        'seller_id',
        'subject',
        'status',
        'last_message',
        'last_message_at',
        'last_message_by',
        'unread_by_user',
        'unread_by_seller',
    ];

    protected $casts = [
        'last_message_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    public function messages()
    {
        return $this->hasMany(ChatMessage::class);
    }

    public function lastMessageSender()
    {
        return $this->belongsTo(User::class, 'last_message_by');
    }

    public function scopeOpen($query)
    {
        return $query->where('status', 'open');
    }

    public function markAsRead(User $user)
    {
        if ($user->id === $this->user_id) {
            $this->update(['unread_by_user' => 0]);
        } else {
            $this->update(['unread_by_seller' => 0]);
        }
    }
}