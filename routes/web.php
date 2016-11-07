<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(array('prefix' => 'api/v1'),function (){
    Route::get('/login','User@login');
    Route::get('/registration','User@registration');
});

Auth::routes();
Route::get('/', 'HomeController@index');