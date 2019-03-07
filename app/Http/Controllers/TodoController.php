<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{
    public function index(){
    	$todos = Todo::paginate(5);
    	return view('todo.index',['data'=>$todos]);
    }
    public function create(){
    	return view('todo.create');
    }

    public function store(Request $request){
    	$input = $request->all();
    	Todo::create($input);
    	return redirect('/todos');
    }
    public function show($id){
    	$data = Todo::find($id);
    	return view('todo.show',['row'=>$data]);
    }
    public function edit($id){
    	$data = Todo::find($id);
    	return view('todo.edit',['row'=>$data]);
    }
    public function update($id, Request $request){

    	$input = Todo::findOrFail($id);
        //$input = $request->all();

        $input->id   = $request->id;
        $input->todo    = $request->todo;


        $input->save();


    	return redirect('/todos');
    }

    public function destroy($id)
    {
        Todo::destroy($id);
        return redirect('/todos');
    }
}
