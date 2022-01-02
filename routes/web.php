<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('home', function(){
    return 'Aya Gamal';
});

Route::view('index', 'index');

Route::get('about', 'AyaController@index');

Route::get('users/{id}', 'AyaController@show');

////   Task1   ////
Route::get('/vist-app', function () {
    return view('greeting');
})->name('Greeting Route');


Route::get('Egypt', 'EgyptController@index');
Route::get('Egypt/{id}', 'EgyptController@show');


////   Task2   ////
Route::resource('task_list', 'TaskListController');

Route::resource('tasks', 'TaskController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
