<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use App\Http\Requests\ValidateTodo;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = Todo::latest()->paginate(5);
    
        return view('todos.index',compact('todos'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateTodo $request)
    {
        $request->validate([
            'title' => 'required',
            'priority' => 'required',
        ]);
     //  var_dump($request->all());
       $todo = new Todo();
       $todo->title = $request->title;
       $todo->priority = $request->priority;
       $todo->save();
       // Todo::create($request->all());
        
        return redirect()->route('todos.index')
                        ->with('success','Todo created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        return view('todos.show',compact('todo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        return view('todos.edit',compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidateTodo $request, Todo $todo)
    {
        $request->validate([
            'title' => 'required',
            'priority' => 'required',
        ]);
    
        $todo->update($request->all());
    
        return redirect()->route('todos.index')
                        ->with('success','Todo updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();
    
        return redirect()->route('todos.index')
                        ->with('success','Todo deleted successfully');
    }
}
