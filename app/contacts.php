<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contacts extends Model
{
    //
    public function contactTracing()
    {
        return $this->hasMany('App\contactTracing', 'recipient');
    }
}
