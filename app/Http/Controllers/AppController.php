<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    public function welcome()
    {
        $todos = Todo::all();
        return view('welcome', ['todos' => $todos]);
    }
}
