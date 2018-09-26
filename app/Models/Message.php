<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';
    protected $fillable = ['chat_id', 'sender_id', 'receiver_id', 'message'];
    protected $guarded = [];

    public function chat() {
        return $this->belongsTo('App\Models\Chat', 'chat_id', 'id');
    }

    public function sender() {
        return $this->belongsTo('App\Models\User', 'sender_id', 'id');
    }

    public function receiver() {
        return $this->belongsTo('App\Models\User', 'receiver_id', 'id');
    }
}
