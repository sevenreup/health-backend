<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name','phone', 'password', 'firebase_token', 'verification_code', 'phone_verified_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'phone_verified_at' => 'datetime',
    ];

    public function hasVerifiedPhone()
    {
        return !is_null($this->phone_verified_at);
    }

    public function markPhoneAsVerified()
    {
        return $this->forceFill([
            'phone_verified_at' => $this->freshTimestamp(),
        ])->save();
    }

    public function routeNotificationForWhatsApp()
    {
        return $this->phone;
    }
    public function routeNotificationForFcm($notification)
{
    return $this->firebase_token;
}


    public function events()
    {
        return $this->hasMany('App\events', 'userId');
    }

    public function contactTraceUser()
    {
        return $this->hasMany('App\contactTraceUser', 'recipient');
    }
    public function contactTraceUserPending()
    {
        return $this->hasMany('App\contactTraceUserPending', 'sender');
    }
}
