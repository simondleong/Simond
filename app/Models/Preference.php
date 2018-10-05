<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Preference extends Model
{
    protected $table = 'preferences';
    protected $fillable = ['user_id', 'gender', 'gender_weight', 'sexual_preference', 'sexual_weight',
                            'personality_type', 'personality_weight', 'age', 'age_weight', 'city', 'city_weight'];
    protected $guarded = [];

    public function user() {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
