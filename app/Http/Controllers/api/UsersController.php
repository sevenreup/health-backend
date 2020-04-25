<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User as User;
use App\contactTraceUser as contactTraceUser;
use App\events as events;
use App\fences as fences;


class UsersController extends Controller
{
    public function getUsers()
    {
        return User::orderby('id','desc')->get();
    }
    public function getSingleUser($userId)
    {
        return User::where('id',$userId)->take(1)->get();
    }
    public function getUserContacts($userId)
    {
        return contactTraceUser::where('sender',$userId)->where('status','accepted')->with('users')->get();
    }
    public function getUserLocations($userId)
    {
        return events::where('userId',$userId)->with('fences')->get();
    }
    public function getPendingUserContacts($userId)
    {
        return contactTraceUser::where('sender',$userId)->where('status','pending')->with('users')->get();
    }

    public function getRejectedUserContacts($userId)
    {
        return contactTraceUser::where('sender',$userId)->where('status','rejected')->with('users')->get();
    }

}

