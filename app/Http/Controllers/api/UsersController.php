<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User as User;
use App\contactTraceUser as contactTraceUser;
use App\ContactTracing as ContactTracing;
use App\events as events;
use App\fences as fences;
use App\contact as contact;
use Illuminate\Support\Facades\Auth;



class UsersController extends Controller
{
    public function getUsers()
    {
        return User::orderby('id','desc')->get();
    }
    public function getNodes()
    {

        return User::select('id','first_name','last_name','phone')->orderby('id','desc')->get();

    }
    public function getLinks()
    {
        $links = contactTraceUser::select('sender as sid','recipient as tid')->where('status','accepted')->get();
        return $links;


    }
    public function getPaginatedUsers($query)
    {
        return User::orderby('id','desc')->paginate($query);
    }
    public function getSingleUser()
    {
        return User::where('id',Auth::user()->id)->take(1)->get();
    }
    public function getSingleUserDash($userId)
    {
        return User::where('id',$userId)->take(1)->get();
    }
    public function getUserContacts()
    {
        $contacts = contactTraceUser::select('id','recipient')->where('sender',Auth::user()->id)->where('status','accepted')->with('User:id,first_name,last_name,phone')->get();
        return $contacts;
    }

    // for testing
    public function getUserContactsTesting()
    {
        $user_id = contact::where('recipientNumber',Auth::user()->phone)->first()->id;
        $contacts = ContactTracing::select('id','recipient')->where('sender',$user_id)->where('status','accepted')->with('contacts:id,recipientName,recipientNumber as phone')->get();
        return $contacts;
    }
    public function getPendingUserContactsTesting()
    {
        $contacts = ContactTracing::select('id','recipient')->where('sender',$user_id)->where('status','pending')->with('contacts:id,first_name,last_name,phone')->get();
        return $contacts;
    }
    // end for for testing


    public function getUserLocations()
    {
        $events = events::where('userId',Auth::user()->id)->with('fences')->get();
        return $events;
    }
    public function getPendingUserContacts()
    {
        $contacts = contactTraceUser::select('id','recipient')->where('sender',Auth::user()->id)->where('status','pending')->with('User:id,first_name,last_name,phone')->get();
        return $contacts;
    }

    public function getRejectedUserContacts()
    {
        return contactTraceUser::where('sender',Auth::user()->id)->where('status','rejected')->with('User')->get();
    }


    public function searchUsers($query)
    {
        return User::where('first_name','ilike','%'.$query.'%')->orWhere('last_name','ilike','%'.$query.'%')->orWhere('phone','ilike','%'.$query.'%')->get();
    }

}

