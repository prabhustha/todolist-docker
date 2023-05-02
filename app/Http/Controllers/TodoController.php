<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function Index(){
        return view('dashboard');
    }
    public function create(){
        return view('todo.create');
    }
    public function upload(Request $request){
        $request->validate([
            'title'=>'required|max:255'
        ]);
        $title=$request->title;
        Todo::create(['title'=>$title]);
        return redirect()->back()->with('message',"TODO created successfully");
    }
    public function edit(){

    }
}
