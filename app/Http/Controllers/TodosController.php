<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\Category;
class TodosController extends Controller
{
    /**
     * usar metodo index para mostrar
     * todos los elementos
     * store para guardar un to do
     * update para actualizar todo
     * destroy para eliminar
     * edit para mostrar el formulario de edicion
     */
    public function store(Request $request){
        $request->validate([
            'title'=>'required|min:3'
        ]);
        $todo=new Todo;
        $todo->title=$request->title;
        $todo->category_id=$request->category_id;
        $todo->save();
        return redirect()->route('todos')->with('success','Tarea creada Correctamente');
    }
    public function index(){
        $todos=Todo::all();
        $categories=Category::all();
        return view('todos.index',['todos'=>$todos,'categories'=>$categories]);
    }
    public function show($id){
        $todo=Todo::find($id);
        return view('todos.show',['todo'=>$todo]);
    }
    public function update(Request $request, $id){
        $todo=Todo::find($id);
        $todo->title=$request->title;
        $todo->save();
        //return view('todos.index',['success'=>$'Tarea Actualizada']);
        return redirect()->route('todos')->with('success','Tarea  Actualizada');
    }
    public function destroy($id){
        $todo=Todo::find($id);
        $todo->delete();
        return redirect()->route('todos')->with('success','Tarea Eliminada');
    }
}
