<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Notifications\AddContact;
use Illuminate\Support\Facades\Auth;
use App\contactTraceUser as contactTraceUser;
use App\contactTraceGuest as contactTraceGuest;
use App\User as User;


class ContactTracingController extends Controller
{
    public function __construct(contactTraceGuest $contactTraceGuest,contactTraceUser $contactTraceUser,User $User)
    {
        $this->contactTraceGuest = $contactTraceGuest;
        $this->contactTraceUser = $contactTraceUser;
        $this->User = $User;

    }
    public function addContact(request $request,contactTraceUser $contactTraceUser,contactTraceGuest $contactTraceGuest)
    {
        // for ($i = 0; $i < count($request->all()); $i++) {

        $recipientData = $this->User->where('phone',$request->input('recipientNumber') )->first();
        if($recipientData)
        {
                $data = [];
                $data['sender'] =  Auth::user()->id;
                $data['recipient'] = $recipientData->id;
                $contactTraceUser->insert($data);
            // $recipientData->notify(new AddedToContactFCM);
            //send notification to user as well as message
        }
        else
        {
            $data = [];
            $data['sender'] =  Auth::user()->id;
            $data['recipientName'] =  $request->input('recipientName');
            $data['recipientNumber'] =  $request->input('recipientNumber');
            $contactTraceGuest->insert($data);
            //send notification to user as well as message

        }
    // }



        return response()->json(['status' => true,'message'=>'contact added'],200);


    }


    public function verifyContactUser(request $request,contactTraceUser $contactTraceUser,contactTraceGuest $contactTraceGuest)
    {
        error_log($request);
        $userData = $this->contactTraceUser->find($request->input('id'));
        $userData->status = $request->input('status');
        $userData->save();
        //send notification to user as well as message
        return response()->json(['status' => true,'message'=>'successful'],200);

    }

    public function verifyContactGuest(request $request,contactTraceUser $contactTraceUser,contactTraceGuest $contactTraceGuest)
    {
        $userData = $this->contactTraceGuest->find($request->input('id'));
        $userData->status = $request->input('status');
        $userData->save();
        //send notification to user as well as message
        return response()->json(['status' => true,'message'=>'successful'],200);

    }
}
