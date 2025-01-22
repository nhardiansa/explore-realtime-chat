<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ChatMessage extends Model
{
    protected $table = 'chat_messages';

    protected $fillable = [
        'sender_id',
        'receiver_id',
        'text_content',
    ];

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }

    public function list(User $user)
    {
        $loggedUserId = Auth::user()->id;

        return ChatMessage::query()
            ->where(function ($query) use ($user, $loggedUserId) {
                $query->where('sender_id', $loggedUserId)
                    ->where('receiver_id', $user->id);
            })
            ->orWhere(function ($query) use ($user, $loggedUserId) {
                $query->where('sender_id', $user->id)
                    ->where('receiver_id', $loggedUserId);
            })
            ->with(['sender', 'receiver'])
            ->orderBy('created_at', 'asc')
            ->get();
    }
}
