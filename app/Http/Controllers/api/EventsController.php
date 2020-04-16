<?php

namespace App\Http\Controllers\api;
use App\events as events;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
            $entryTime = $this->events->where('userId',$request->input('userId'))->orderby('id','desc')->first()->createdAt;
            $data['duration'] = Carbon::now()->diffInMinutes($entryTime);
        }
        $data['userId'] =  $request->input('userId');
        $data['fencesId'] =  $request->input('fencesId');
        //check case data for this region and send notification.

        $events->insert($data);


        return response()->json(['status' => true],200);


    }

    
}
