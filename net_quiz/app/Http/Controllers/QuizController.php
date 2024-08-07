<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Choice;
use PhpParser\Node\Stmt\Foreach_;

class QuizController extends Controller
{
    public function create(){
        $screen_id="create";
        return view('create_show_edit',compact("screen_id"));
    }

    public function mobileQuizIndex(){
        $quizzes=Quiz::all();
        // $quizzes=Quiz::where("quizkind",0)->get();
        return view('mobile_quiz.index',compact("quizzes"));
    }

    

    public function netQuizIndex(){
        $quizzes=Quiz::all();
        return view('net_quiz.index',compact("quizzes",));
        
        
        
    }
    public function store(Request $request){
    $request->session()->regenerate();
    $quiz=new Quiz();
    $quiz->quiz=$request->quiz;

    $quiz->kind=$request->quiz_kind;
    $quiz->save();
    $choice_numbers=[$request->choice1,$request->choice2,$request->choice3,$request->choice4];
    

    for ($i=0; $i < 4; $i++) { 
        $choice=new Choice();
        $choice->choice=$choice_numbers[$i];
        $choice->quiz_id=$quiz->id;
        if($request->answer==$i){
            $choice->answer=1;
            

        }else {
            $choice->answer=0;
        }
        $choice->save();
        
    }
    $quizzes=Quiz::all();
    $choices=Choice::all();
    return view('mobile_quiz.index',compact("quizzes"));
}
        public function mobileQuizShow(Quiz $quiz){
        $screen_id="show";
        return view('create_show_edit',compact("quiz","screen_id"));
        }
        public function mobileQuizEdit(Quiz $quiz){
            $screen_id="edit";
            return view('create_show_edit',compact("quiz","screen_id"));
        }
        public function updateQuiz(Request $request,Quiz $quiz)
        {
            $request->session()->regenerate();
            $quiz=new Quiz();
            $quiz->quiz=$request->quiz;
        
            $quiz->kind=$request->quiz_kind;
            $quiz->update();
            $choice_numbers=[$request->choice1,$request->choice2,$request->choice3,$request->choice4];

        foreach ($quiz->choices as $choice) {
        $choice->choice=$choice_numbers;
        $choice->quiz_id=$quiz->id;

        $choice->save();
    
        }
        $quizzes=Quiz::all();
        $choices=Choice::all();
        return view('mobile_quiz.index',compact("quizzes","choices"));
        }
    
}