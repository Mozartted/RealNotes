<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware'=>'auth:api'],function(){
	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/notes',['as'=>'noteGet','uses'=>'NoteController@notes']);
	Route::post('/notes/create',['as'=>'noteCreate','uses'=>'NoteController@createNote']);
	Route::delete('/notes/delete/{id}',['as'=>'noteControl','uses'=>'NoteController@deleteNote']);
	Route::put('/notes/update/{id}',['as'=>'noteControl','uses'=>'NoteController@updateNote']);
});
