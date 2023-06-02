<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function Index(){
        $todos= Todo::all();
        return view('dashboard')->with(['todo'=>$todos]);
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
    public function edit($id){
        $todos= Todo::find($id);
        $updateTitle= $todos->title;
        return view('todo.edit')->with(['id'=>$id, 'title'=>$updateTitle]);
    }
    public function update(Request $request){
        $title= $request->title;
        $request->validate([
            'title'=>'required|max:255'
        ]);
        $id= $request->id;
        $UpdateTodo= Todo::find($id);
        $UpdateTodo->update(['title'=>$title]);
        return redirect()->route('dashboard')->with('message',"TODO list successfully Edited!!");
    }
    public function status($id){
        $todo= Todo::find($id);
        if($todo->completed){
            $todo->update(['completed'=>false]);
            return redirect()->back()->with('message','TODO marked as incomplete');
        }else{
            $todo->update(['completed'=>true]);
            return redirect()->back()->with('message','TODO marked as complete');
        }
    }
    public function delete($id){
        Todo::find($id)->delete();
        return redirect()->back()->with('message',"TODO is successfully Deleted!!!!!");
      }
}
