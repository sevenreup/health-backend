<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contactTraceUser extends Model
{
    public function User()
    {
        return $this->belongsTo('App\User', 'sender');
    }
}
