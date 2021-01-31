<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class questions extends Model
{
    public function getAnswersEnglishAttribute($value)
    {
        return json_decode($value);
    }
    public function getAnswersChichewaAttribute($value)
    {
        return json_decode($value);
    }
    protected $hidden = ['created_at','updated_at'];
}
