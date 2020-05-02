<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contactTracing extends Model
{
    //
    public function contacts()
    {
        return $this->belongsTo('App\contacts', 'recipient');
    }
}
