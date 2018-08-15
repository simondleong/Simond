<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Preference extends Model
{
    protected $table = 'preferences';
    protected $fillable = ['user_id', 'personality_type', 'age'];
    protected $guarded = [];

    public function user() {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
