<?php

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

Route::resource('tasks','taskController1')->middleware('CheckLog');

Route::get('login','taskController1@loginTask');
Route::post('doLogin','taskController1@loggedTask');

Route::get('userCreate','taskController1@userR');
Route::post('register','taskController1@userI');

Route::get('LogOut','taskController1@logout');

// Route::get('studentTask','taskController1@studentView');

// Route::get('systemLog','taskController1@systemL');
// Route::post('systemLogin','taskController1@systemLog')->middleware('studentTask');
