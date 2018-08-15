<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = 'photos';
    protected $fillable = ['user_id', 'filename', 'is_profile_pic'];
    protected $guarded = [];

    public function user() {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
