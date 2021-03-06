<?php

namespace App\Http\Controllers;

use App\Models\todolist;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class TodolistController extends Controller
{
    public function showAllData(){
        return view('fetchedData')->with('todoArray', todolist::paginate(10));
    }

    public function delete($id){
        todolist::destroy('id', $id);
        return redirect('/');
    }

    public function createView(){
        return view('create');
    }

    public function createTodo(Request $request){
        $request->validate([
            'task' => 'required|max:255',
            'status' => 'required',
        ]);
        $todo = new todolist();
        $todo->todo = $request->input('task');
        $todo->status = $request->input('status');
        $todo->save();

        return redirect('/');
    }

    public function editView($id){
        return view('edit')->with('todo', todolist::find($id));
    }

    public function updateTodo($id, Request $request){
        $request->validate([
            'task' => 'required|max:255',
            'status' => 'required',
        ]);
        $todo = todolist::find($id);
        if ($todo->status === 2){
            return redirect('edit/'.$id)->withErrors(array("status" => "The task has been completed already."));
        }
        $todo->todo = $request->input('task');
        $todo->status = $request->input('status');
        $todo->save();

        return redirect('/');
    }
}
