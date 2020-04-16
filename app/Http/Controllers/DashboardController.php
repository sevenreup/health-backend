<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\events as events;
use App\User as User;
use App\fences as fences;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $data = [];
        $data['eventsCount'] = events::count();
        $data['usersCount'] = User::count();
        $data['fencesCount'] = fences::count();
        
        return view('dashboard',$data);
    }
}
