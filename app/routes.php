<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('fbtest', function()
{
    return 'Users!';
});



Route::resource('user', 'UserController');
Route::resource('user/', 'UserController');

Route::group(array('prefix' => 'api/v1', 'before' => 'auth.facebook'), function()
{
    Route::resource('note', 'NoteController');
    Route::resource('note/', 'NoteController');

    Route::resource('annotation', 'AnnotationController');
    Route::resource('annotation/', 'AnnotationController');

});

Route::get('/authtest', array('before' => 'auth.basic', function()
    {
    return View::make('hello');
    })
);

Route::get('login/fb', 'FacebookController@login');
Route::get('login/fb/callback', 'FacebookController@callback');
Route::get('/fb', 'FacebookController@status');

Route::get('logout', function() {
    Auth::logout();
    return Redirect::to('/fb');
});



