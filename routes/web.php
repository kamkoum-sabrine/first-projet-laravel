<?php
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\AppController;
use App\Http\Controllers\TodoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Route::get('/todos',[AppController::class,'todos']);
Route::resource('todos', TodoController::class);
