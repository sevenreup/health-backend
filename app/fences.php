<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fences extends Model
{
    protected $table ="geofences";

    public function events()
    {
        return $this->hasMany('App\events', 'fencesId');
    }
}
