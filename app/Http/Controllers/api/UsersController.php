<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User as User;
use App\contactTraceUser as contactTraceUser;
use App\events as events;
use App\fences as fences;
use Illuminate\Support\Facades\Auth;



class UsersController extends Controller
{
    public function getUsers()
    {
        return User::orderby('id','desc')->get();
    }
    public function getSingleUser()
    {
        return User::where('id',Auth::user()->id)->take(1)->get();
    }
    public function getUserContacts()
    {
        $contacts = contactTraceUser::where('sender',Auth::user()->id)->where('status','accepted')->with('User')->get();
        // $response = [];
        // foreach ($contacts as $contact) {
        //     $response[] = $this->transform($contact);
        // }
        // return contactTraceUser::select('id','recipient')->where('sender',Auth::user()->id)->where('status','accepted')->with('User:id,first_name')->get();
        // return response()->json([
        //     'id' => $contacts->id,
        //     'first_name' => $contacts->User->first_name,
        //     'last_name' => $contacts->User->last_name,
        //     'phone' => $contacts->User->phone,

        // ]);
        return $contacts;
    }
    public function transform(contactTraceUser $contact) {
        return [
            'username' => $contact->id,
        ];
    }
    public function getUserLocations()
    {
        return events::where('userId',Auth::user()->id)->with('fences')->get();
    }
    public function getPendingUserContacts()
    {
        return contactTraceUser::where('sender',Auth::user()->id)->where('status','pending')->with('User')->get();
    }

    public function getRejectedUserContacts()
    {
        return contactTraceUser::where('sender',Auth::user()->id)->where('status','rejected')->with('User')->get();
    }

}

