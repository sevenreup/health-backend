<?php

namespace App\Http\Controllers\api;
use App\events as events;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventsController extends Controller
{
    public function tiggerEvents(request $request,events $events)
    {
        $data = [];
        $data['external_id'] =  $request->input('_id');
        $data['live'] =  $request->input('live');
        $data['locationAccuracy'] =  $request->input('locationAccuracy');
        $data['confidence'] =  $request->input('confidence');
        if($request->input('type') == 'user.entered_geofence')
        {
            $data['type'] = 'entry';
        }
        else
        {
            $data['type'] = 'exit';
            $entryTime = $this->events->where('userId',Auth::user()->id)->orderby('id','desc')->first()->createdAt;
            $data['duration'] = Carbon::now()->diffInMinutes($entryTime);
        }
        $data['userId'] =  Auth::user()->id;
        $data['fencesId'] =  $request->input('geofence.externalId');
        //check case data for this region and send notification.

        $events->insert($data);


        return response()->json(['status' => true],200);


    }


}
