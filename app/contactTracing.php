<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contactTracing extends Model
{
    //
    protected $table ="ContactTracing";
    public function contact()
    {
        return $this->belongsTo('App\contact', 'recipient');
    }
}
