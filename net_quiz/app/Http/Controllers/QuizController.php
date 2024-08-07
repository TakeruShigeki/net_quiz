<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Choice;
use PhpParser\Node\Stmt\Foreach_;

class QuizController extends Controller
{







  public function create()
  {
    $screen_id = "create";
    return view('create_show_edit', compact("screen_id"));
  }










  public function mobileQuizIndex()
  {
    $quizzes = Quiz::all();
    // $quizzes=Quiz::where("quizkind",0)->get();
    return view('mobile_quiz.index', compact("quizzes"));
  }










  public function netQuizIndex()
  {
    $quizzes = Quiz::all();
    return view('net_quiz.index', compact("quizzes",));
  }















  public function store(Request $request)
  {
    dd($request);
    $request->session()->regenerate();
    $quiz = new Quiz();
    $quiz->quiz = $request->quiz;

    $quiz->kind = $request->quiz_kind;
    $quiz->save();
    $choice_numbers = [$request->choice1, $request->choice2, $request->choice3, $request->choice4];


    for ($i = 0; $i < 4; $i++) {
      $choice = new Choice();
      $choice->choice = $choice_numbers[$i];
      $choice->quiz_id = $quiz->id;
      if ($request->answer == $i) {
        $choice->answer = 1;
      } else {
        $choice->answer = 0;
      }
      $choice->save();
    }
    $quizzes = Quiz::all();
    $choices = Choice::all();
    return view('mobile_quiz.index', compact("quizzes"));
  }













  public function mobileQuizShow(Quiz $quiz)
  {
    $screen_id = "show";
    return view('create_show_edit', compact("quiz", "screen_id"));
  }








  public function mobileQuizEdit(Quiz $quiz)
  {
    $screen_id = "edit";
    return view('create_show_edit', compact("quiz", "screen_id"));
  }









  public function updateQuiz(Request $request, Quiz $quiz)
  {
    $request->session()->regenerate();
    // ↓updateなのでnew はつかわない
    $quiz = new Quiz(); //これは不必要:newはあたらしくデータをつくったり呼び起こす際に利用する。
    // ↑★すでにupdateQuizメソッドの第二引数としてQuiz $quizはひきうけている。
    $quiz->quiz = $request->quiz;
    $quiz->kind = $request->quiz_kind;
    $quiz->update();



    $choice_numbers = [$request->choice1, $request->choice2, $request->choice3, $request->choice4];
// いったんこれでいま、引き受けている変数の中身を確認しよう。
    dd($request);
    foreach ($quiz->choices as $key => $choice) {
      //★$choice->choice:選択肢の文字列 今回でいうと$choice_numbersの中に格納されているそれぞれの文字列。[配列の取り出し方]で検索
      // ★$choice->answer:追記する必要あり 例↓
      // if ($request->answer == $i) {
      //   $choice->answer = 1;
      // } else {
      //   $choice->answer = 0;
      // }
      // ★$choice->quiz_id:OK
      $choice->choice = $choice_numbers;
      $choice->quiz_id = $quiz->id;

      // ↓★DBのデータの新規作成のときはsave()メソッドをつかうが更新のときにはupdate()メソッドをつかう。
      $choice->save();
      // $choice->update();

    }
    // ↓一覧画面にするときには全部のデータをとってくるので良い※$choicesは、$quizのリレーションでひっぱてくれるので不要
    // $quizzes = Quiz::all();
    // $choices = Choice::all();
    // return view('mobile_quiz.index', compact("quizzes", "choices"));
    // ↓★ここは、更新後にどこの画面に遷移したいかで書き方がかわるが、いったんデータが更新したかどうか確認したいなら、show画面でよさそう。
    return redirect()->route("mobileQuizShow", [$quiz])
      ->with("message", "データを更新しました。");
  }
}
