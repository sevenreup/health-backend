<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    //
    protected $table ="contacts";
    public function contactTracing()
    {
        return $this->hasMany('App\contactTracing', 'recipient');
    }
}
