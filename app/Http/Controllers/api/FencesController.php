<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User as User;
use App\contactTraceUser as contactTraceUser;
use App\events as events;
use App\fences as fences;

class FencesController extends Controller
{
    public function getFences()
    {
        return fences::orderby('id','desc')->get();
    }
    public function getUsersInFence($fencesId)
    {
        return events::where('fencesId',$fencesId)->with('users')->get();
    }
    
}
