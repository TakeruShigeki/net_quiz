<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Choice;
use PhpParser\Node\Stmt\Foreach_;

class QuizController extends Controller
{
    public function createQuiz(){



        $quiz=new Quiz();
        $quiz->quiz="クイズ作成3号";
        $quiz->save();
        
        
    }




    public function create(){
        return view('create');
    }

    public function mobileQuizIndex(){
        $quizzes=Quiz::all();
        // $quizzes=Quiz::where("quizkind",0)->get();
        return view('mobile_quiz.index',compact("quizzes"));
    }

    

    public function netQuizIndex(){
        $quizzes=Quiz::all();

        return view('net_quiz.index',compact("quizzes"));

        
        
    }
    public function store(Request $request){

    $quiz=new Quiz();
    $quiz->quiz=$request->quiz;

    $quiz->kind=$request->quiz_kind;
    $quiz->save();
    $choice_numbers=[$request->choice1,$request->choice2,$request->choice3,$request->choice4];

    for ($i=0; $i < 4; $i++) { 
        # code...
        $choice=new Choice();
        $choice->choice=$choice_numbers[$i];
        if($request->answer==$i){
            $choice->answer=1;
            

        }else {
            $choice->answer=0;
        }
        $choice->save();
    }
}
}

