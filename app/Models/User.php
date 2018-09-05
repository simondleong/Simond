<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $fillable = ['first_name', 'last_name', 'email', 'password', 'phone', 'gender',
                            'sexual_preference', 'personality_type', 'age', 'city'];
    protected $guarded = [];

    public function preference() {
        return $this->hasOne('App\Models\Preference', 'user_id', 'id');
    }

    public function photos() {
        return $this->hasMany('App\Models\Photo', 'user_id', 'id');
    }
}
