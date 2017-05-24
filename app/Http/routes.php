<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return redirect('films');
});

/*/Route::get('/films', function () {
    return view('welcome');
});*/


Route::resource('films', 'Api\FilmsController');

Route::post('/films/{film_id}/comment', 'Api\FilmsController@comment');

Route::auth();

Route::get('/home', 'HomeController@index');
