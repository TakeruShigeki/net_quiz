<?php

namespace App\Http\Controllers;

use App\Models\Choice;
use Illuminate\Http\Request;

class ChoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,$quiz_id)
    {
        $importances =4;
        $choicesId=array(
            '1'=>'choice1',
            '2'=>'choice2',
            '3'=>'choice3',
            '4'=>'choice4');
        foreach($choicesId as $key=>$choicesId){
        $choice=new Choice();
        $choice->answer=$request->$choicesId;
        if($request->$key =="on"){
            $choice->answer_flag=1;
        }else{
            $choice->answer_flag=0;
        }
        $importances+=1;
        $choice->importance=$request->$importances;
        $choice->quiz_id = $quiz_id; 
        $choice->save();
        return back()->with("message", "問題を保存しました。");
    }
}

    /**
     * Display the specified resource.
     */
    public function show(Choice $choice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Choice $choice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Choice $choice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Choice $choice)
    {
        //
    }
}
