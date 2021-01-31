<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class answers extends Model
{
    protected $hidden = ['created_at','updated_at'];
    // public function getAnswerArrayAttribute($value)
    // {
    //     return json_decode($value);
    // }
    
}
