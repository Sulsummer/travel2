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

//Route::get('home', 'WelcomeController@index');

Route::get('/', 'HomeController@index');

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
	Route::resource('handle','NoteHomeController');
	Route::group(['middleware' => 'auth', 'namespace' => 'Comment'],function(){
		Route::resource('notecomment','CommentNoteController');


	});

});


Route::group(['prefix' => 'group','namespace' => 'Group'],function(){
	Route::get('/','GroupHomeController@index');
	Route::get('viewgroup/{id}','GroupHomeController@show');
	Route::resource('handle','GroupHomeController');
	Route::group(['middleware' => 'auth', 'namespace' => 'Comment'],function(){
		Route::resource('groupcomment','CommentGroupController');
	});
});

Route::group(['prefix' => 'user','namespace' => 'User'], function(){
	Route::get('/','UserHomeController@index');
	Route::get('viewuser/{id}','UserHomeController@show');
});











