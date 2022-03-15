<?php

namespace App\Http\Controllers;
use App\Models\Post;

use Illuminate\Http\Request;

class AppController extends Controller
{
    public function welcome()
    {
        //$todos = Todo::all();
        $posts = Post::all();
       
        return view('welcome');
    }
    public function todos()
    {
        //$todos = Todo::all();
        $posts = Post::all();
        
        return view('todos',['posts'=>$posts]);
    }
}
