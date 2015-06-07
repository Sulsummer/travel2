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


Route::get('/', 'HomeController@index');
//Route::get('signUp', 'HomeController@signUp');
//Route::get('signIn', 'HomeController@signIn');


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function(){
	Route::get('/','AdminHomeController@index');
});

Route::group(['prefix' => 'note', 'namespace' => 'Note'], function(){
	Route::get('/','NoteHomeController@index');
	Route::group(['prefix' => 'viewnote/{id}'],function(){
		Route::get('/','NoteHomeController@show');
		Route::group(['middleware' => 'auth'],function(){
			Route::get('praise','NoteHomeController@praise');
		});
	});
	Route::resource('handle','NoteHomeController');
	Route::group(['middleware' => 'auth', 'namespace' => 'Comment'],function(){
		Route::resource('notecomment','CommentNoteController');


	});

});


Route::group(['prefix' => 'group','namespace' => 'Group'],function(){
	Route::get('/','GroupHomeController@index');
	Route::group(['prefix' => 'viewgroup/{id}'],function(){
		Route::get('/','GroupHomeController@show');
		Route::get('announce','GroupHomeController@announce');
		Route::post('pushAnnounce','GroupHomeController@pushAnnounce');
		Route::group(['middleware' => 'auth'],function(){
			Route::get('join','GroupHomeController@join');
			Route::get('praise','GroupHomeController@praise');
		});
	});
	Route::post('modify','GroupHomeController@update');
	Route::resource('handle','GroupHomeController');
	Route::group(['middleware' => 'auth', 'namespace' => 'Comment'],function(){
		Route::resource('groupcomment','CommentGroupController');
	});
});

Route::group(['prefix' => 'user','namespace' => 'User'], function(){
	Route::get('/','UserHomeController@index');
	Route::post('ok','UserHomeController@acceptApply');
	Route::post('delete','UserHomeController@deleteApply');
	Route::group(['prefix' => 'viewuser/{id}'],function(){
		Route::get('/','UserHomeController@show');
		Route::group(['middleware' => 'auth'],function(){
			Route::get('praise','UserHomeController@praise');
			Route::group(['prefix' => 'apply'],function(){
				Route::get('/','UserHomeController@apply');
			});
		});
	});
	Route::group(['middleware' => 'auth', 'namespace' => 'Comment'],function(){
		Route::resource('usercomment','CommentUserController');
	});
});


Route::group(['prefix' => 'mailbox','namespace' => 'Msg','middleware' => 'auth'],function(){
	Route::get('/','MsgController@getMsg');
	Route::group(['prefix' => 'viewmsg'],function(){
		Route::get('{id}','MsgController@showMsgDetail');
	});
	Route::get('talk/{id}','MsgController@sendMsg');
	Route::resource('send','MsgController',['only' => ['store']]);
});








