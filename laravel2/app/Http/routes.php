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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function(){
	Route::get('/','AdminHomeController@index');
});

Route::group(['prefix' => 'note', 'namespace' => 'Note'], function(){
	Route::get('/','NoteHomeController@index');
	Route::get('viewnote/{id}','NoteHomeController@show');
	Route::group(['namespace' => 'Comment'],function(){
		Route::resource('notecomment','CommentNoteController');	
	});
	
	Route::resource('handle','NoteHomeController',['only' => ['create','store','update','destroy','edit']]);
});


Route::group(['prefix' => 'group','namespace' => 'Group'],function(){
	Route::get('/','GroupHomeController@index');
	Route::get('viewgroup/{id}','GroupHomeController@show');
	Route::group(['namespace' => 'Comment'],function(){
		Route::resource('groupcomment','CommentGroupController');
	});
	Route::resource('handle','GroupHomeController');
});











