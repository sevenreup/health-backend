<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\questions as questions;
use App\answers as answers;
use Illuminate\Support\Facades\Auth;



class SelfTestController extends Controller
{
    public function __construct(questions $questions, answers $answers)
    {
    	$this->questions = $questions;
    	$this->answers = $answers;

    }
    public function getQuestions()
    {
        $questions =  questions::orderby('id','asc')->get();
        return response()->json(['status' => true,'message'=>'successful', 'data'=>$questions],200);

    }



   
    
    public function addAnswers(answers $answers, request $request)
    {
        $json = '[{"answerArray":[0,2],"completeID":2,"createdAt":"Sep 25, 2020 4:14:58 PM","id":6,"questionID":0,"type":224},{"answerArray":[1,2],"completeID":2,"createdAt":"Sep 25, 2020 4:14:58 PM","id":7,"questionID":0,"type":224},{"answerBoolean":true,"completeID":2,"createdAt":"Sep 25, 2020 4:14:58 PM","id":9,"questionID":0,"type":223}]';
        $json2 = '[{"answerArray":[0],"completeID":1,"createdAt":"Sep 29, 2020 11:38:31 AM","id":1,"questionID":1,"type":224},{"answerArray":[0],"completeID":1,"createdAt":"Sep 29, 2020 11:38:32 AM","id":2,"questionID":2,"type":224},{"answerBoolean":true,"completeID":1,"createdAt":"Sep 29, 2020 11:38:39 AM","id":3,"questionID":3,"type":223},{"answerBoolean":true,"completeID":1,"createdAt":"Sep 29, 2020 11:38:47 AM","id":4,"questionID":4,"type":223},{"completeID":1,"createdAt":"Sep 29, 2020 11:38:52 AM","id":5,"longAnswer":"aaaa","questionID":5,"type":223}]';
        // $trialRequest = array(
        //     'question_id' => 1,
        //     'user_id' => 7,
        //     'answer_array' => ['j','w'],
        //     'answer_boolean' => 'yes',
        //     'long_answer' => '$public');

            $data = json_decode($json2, true);
            error_log(count($data));

            foreach($data as $singleData )
            {
                error_log($singleData['completeID']);

                $data = [];
                $data['question_id'] =  $singleData['id'];
                $data['user_id'] =  Auth::user()->id;
                if($singleData['type'] == 224){
                    $data['answer_array'] =  json_encode($singleData['answerArray']);
                }elseif($singleData['type'] == 225){
                    $data['long_answer'] =  $request->input('long_answer');
                }else{
                    $data['answer_boolean'] = $singleData['answerBoolean']?'yes':'no';
                }
                $answers->insert($data);

            }
            error_log($request);

        // $data = [];
        // $data['question_id'] =  $request->input('question_id');
        // $data['user_id'] =  Auth::user()->id;
        // $data['answer_array'] =  $request->input('answer_array');
        // $data['answer_boolean'] =  $request->input('answer_boolean');
        // $data['long_answer'] =  $request->input('long_answer');


        // $answers->insert($data);
        return response()->json(['status' => true,'message'=>'Submitted successfully','data' => $request->all()],200);

    }


    public function getAnswers()
    {
        $answers =  answers::orderby('id','desc')->get();
        return response()->json(['status' => true, 'data'=>$answers],200);

    }
}
