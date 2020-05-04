<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contactTraceUserPending extends Model
{
    protected $table = "contactTracingUser";
    public function User()
    {
        return $this->belongsTo('App\User', 'sender');
    }
}
