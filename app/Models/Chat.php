<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $table = 'chats';
    protected $fillable = ['date_id'];
    protected $guarded = [];

    public function messages() {
        return $this->hasMany('App\Models\Message', 'chat_id', 'id');
    }

    public function date() {
        return $this->belongsTo('App\Models\Date', 'date_id', 'id');
    }
}
