<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;

class QuizController extends Controller
{
    public function createQuiz(){



        $quiz=new Quiz();
        $quiz->quiz="クイズ作成3号";
        $quiz->save();
        
        
    }
}
