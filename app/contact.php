<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    //
    protected $table ="contacts";
    public function contactRecipient()
    {
        return $this->belongstoMany('App\contact', 'contactTracing','sender','recipient');
    }
    public function contactSender()
    {
        return $this->belongstoMany('App\contact', 'contactTracing','recipient','sender');
    }
}
