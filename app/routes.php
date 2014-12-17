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

Route::get('/post/{id}', 'PostsController@show');

Route::get('/post/edit/{post_id}', 'PagesController@editPost');

Route::post('/post/edit/{post_id}', 'PostsController@edit');

Route::post('/post/comment/{post_id}', 'CommentsController@create');

Route::get('/post/delete/{id}', 'PostsController@destroy');

Route::get('/registration', 'PagesController@registration');

Route::post('/registration', 'UsersController@create');

Route::get('/user/{username}', 'UsersController@show');

Route::get('/credits', 'PagesController@showCredits');

Route::get('/searchByTag/{tagName}', 'PagesController@searchByTag');

Route::get('/searchByForm', 'PagesController@searchByForm');

Route::get('/about', 'PagesController@showAbout');

Route::get('/comment/delete/{id}', 'CommentsController@destroy');

Route::get('/comment/edit/{id}', 'PagesController@editComment');

Route::post('/comment/edit/{id}', 'CommentsController@edit');

Route::get('/user/{id}/comments', 'UsersController@showAllComments');