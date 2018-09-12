<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    protected $table = 'dates';
    protected $fillable = ['sender_id', 'receiver_id', 'status', 'sender_confirmation', 'receiver_confirmation'];
    protected $guarded = [];

    public function sender() {
        return $this->belongsTo('App\Models\User', 'sender_id', 'id');
    }

    public function receiver() {
        return $this->belongsTo('App\Models\User', 'receiver_id', 'id');
    }
}
