<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function tiggerEvents(request $request)
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
        $data['regionId'] =  $request->input('regionId');
        //check case data for this region and send notification.
        //insert data into the model


    }
}
