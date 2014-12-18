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

    public function searchByTag($tagName)
    {
    	$posts = [];
    	$tags = Tag::where('tag_text', '=', $tagName)->get();
    	foreach ($tags as $tag) {
    		$posts[] = $tag->post;
    	}
    	return View::make('pages.searchByTag')->withTag($tagName)->withPosts($posts);
    }

    public function searchByForm()
    {
    	$option = Input::get('sortBy');
		$input = Input::get('search');
		if($option == 'tag')
		{
			$posts = [];
			$tags = Tag::where('tag_text','=', $input)->get();
	    	foreach ($tags as $tag) 
	    	{
	    		$posts[] = $tag->post;
	    	}
	    	return View::make('pages.searchByTag')->withTag(Input::get('search'))->withPosts($posts);
		}
		elseif($option == 'username')
		{
			$user = User::where('username', '=', $input)->first();
			return View::make('users.show')->withUser($user);
		}
		elseif($option == 'postTitle')
		{
			$post = Post::where('post_title', '=', $input)->first();
			if(isset($post))
			{ 
				$tags = $post->tags;
				$tagsText = [];
				foreach ($tags as $tag) {
					$tagsText[] = $tag->tag_text;
				}
				$comments = $post->comments()->paginate(5);
				if(isset($post)) 
				{
					$post->visits_counter++;
					$post->save();
				}
				return View::make('posts.show')->withPost($post)->withTags($tagsText)->withComments($comments);
			}
			else
			{
				$posts = [];
				foreach (Post::all() as $post) 
				{
					if(strpos($post->post_title, $input))
					{
						$posts[] = $post;
					}
				}
				return View::make('pages.showSimilarPosts')->withPosts($posts)->withSearch($input);
			}
		}
		else
		{
			return View::make('pages.pageNotFound');
		}
    }

    public function showCredits()
    {
        return View::make('pages.credits');
    }

    public function showAbout()
    {
        return View::make('pages.about');
    }

    public function editComment($id)
    {
    	return View::make('comments.edit')->withComment(Comment::find($id));
    }

    public function showEditUser($username)
    {
    	if(Auth::check() && Auth::user()->username == $username)
    	{
    		return View::make('pages.editUser')->withUser(Auth::user());
    	}
    	else
    		return View::make('pages.pageNotFound');
    }
}