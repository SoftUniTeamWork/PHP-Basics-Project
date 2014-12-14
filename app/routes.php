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

Route::get('/', 'PostsController@index');

Route::get('/login', 'PagesController@showLogin');

Route::post('/login', 'PagesController@doLogin');

Route::get('/logout', 'PagesController@doLogout');

Route::get('/post/create', 'PagesController@createPost');

Route::post('/post/create', 'PostsController@create');

Route::get('/post/delete/{id}', 'PostsController@destroy');

Route::post('register_action', function()
{
    $obj = new UsersController() ;
    return $obj->store();
});