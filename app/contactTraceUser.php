<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contactTraceUser extends Model
{
    protected $table = "contactTracingUser";
    public function User()
    {
        return $this->belongsTo('App\User', 'recipient');
    }
}
