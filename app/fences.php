<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fences extends Model
{
    public function events()
    {
        return $this->hasMany('App\events', 'fencesId');
    }
}
