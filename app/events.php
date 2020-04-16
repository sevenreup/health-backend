<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class events extends Model
{
    public function User()
    {
        return $this->belongsTo('App\User', 'userId');
    }
    public function fences()
    {
        return $this->belongsTo('App\fences', 'fencesId');
    }
}
