<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function updateFirebaseToken(Request $request)
    {
        error_log($request);
        $userData = $request->user();
        $userData->firebase_token = $request->input('firebase_token');
        $userData->save();
        //send notification to user as well as message
        return response()->json(['status' => true,'message'=>'successful'],200);
    }
}
