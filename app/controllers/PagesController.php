<?php

class PagesController extends \BaseController {

	public function index()
	{
		return View::make("index");
	}

	public function createPost()
	{
		return View::make("pages.createPost");
    }

    public function editPost($post_id)
    {
    	$post = Post::find($post_id);
    	return View::make('posts.edit')->with('post', $post);
    }

	public function showLogin()
	{
		return View::make('pages.login');
	}

	public function doLogout()
	{
		Auth::logout();
		return Redirect::to('/');
	}

	public function doLogin()
	{
		$rules = array
		(
			'email' => 'required|email',
			'password' => 'required|alphaNum|min:6'
		);
		$validator = Validator::make(Input::all(), $rules);
		if($validator->fails())
		{
			return Redirect::to('login')
			->withErrors($validator);
		}
		else
		{
			$userdata = array
			(
				'email' => Input::get('email'),
				'password' => Input::get('password')
			);
			if(Auth::attempt($userdata))
			{
				return Redirect::to('/');
			}
			else
			{
				return Redirect::to('login');
			}
		}
	}

    public function registration()
    {
        return View::make('pages.registration');
    }
}
