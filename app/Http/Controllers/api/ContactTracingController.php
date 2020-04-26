<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Notifications\AddContact;
use Illuminate\Support\Facades\Auth;


class ContactTracingController extends Controller
{
    public function addContact(request $request,contactTracingUser $contactTracingUser,contactTracingGuest $contactTracingGuest)
    {
        $recipientData = $this->User->where('phone',$request->input('recipientNumber') )->get();
        if($recipientData)
        {
            $data = [];
            // $data['sender'] =  $request->input('sender');
            $data['sender'] =  Auth::user()->id;

            $data['recipient'] = $recipientData->id;

            $contactTracingUser->insert($data);
            $recipientData->notify(new AddedToContactFCM);
            //send notification to user as well as message
        }
        else
        {
            $data = [];
            $data['sender'] =  Auth::user()->id;
            $data['recipientName'] =  $request->input('recipientName');
            $data['recipientNumber'] =  $request->input('recipientNumber');
            $contactTracingGuest->insert($data);
            //send notification to user as well as message

        }


        return response()->json(['status' => true,'message'=>'contact added'],200);


    }


    public function verifyContactUser(request $request,contactTracingUser $contactTracingUser,contactTracingGuest $contactTracingGuest)
    {
        $userData = $this->contactTracingUser->find($request->input('id'));
        $userData->status = $request->input('status');
        $userData->save();
        //send notification to user as well as message
        return response()->json(['status' => true,'message'=>'successful'],200);

    }

    public function verifyContactGuest(request $request,contactTracingUser $contactTracingUser,contactTracingGuest $contactTracingGuest)
    {
        $userData = $this->contactTracingGuest->find($request->input('id'));
        $userData->status = $request->input('status');
        $userData->save();
        //send notification to user as well as message
        return response()->json(['status' => true,'message'=>'successful'],200);

    }
}
