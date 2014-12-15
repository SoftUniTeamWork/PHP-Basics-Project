<?php

class PostsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$posts = Post::all();
        $recentPosts = Post::orderBy('created_at','desc')->paginate(10);
        $mostVisited = Post::orderBy('visits_counter','desc')->paginate(10);
		return View::make('index')->with('posts', $posts)->with("recentPosts",$recentPosts)->with("mostVisited",$mostVisited);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */

	public function create()
	{
		$rules = array
		(
			'title' => 'required|min:3',
			'text' => 'required|min:10',
			'tags' => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails())
		{
			return Redirect::to('/post/create');
		}
		else
		{
			$post = new Post;
			$post->post_title = Input::get('title');
			$post->user_id = Auth::user()->id;
			$post->post_text = Input::get('text');
			$post->save();
			$tags = explode(',', Input::get('tags'));
			foreach($tags as $value)
			{
				$value = trim($value);
				$tag = new Tag;
				$tag->post_id = $post->id;
				$tag->tag_text = $value;
				$tag->save();
			}
			return Redirect::to('/');
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$post = Post::find($id);
		$post->visits_counter++;
		$post->save();
		return View::make('posts.show')->withPost($post);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$rules = array
		(
			'title' => 'required|min:3',
			'text' => 'required|min:10',
			'tags' => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails())
		{
			return Redirect::to('/post/edit/' . $id);
		}
		else
		{
			$post = Post::find($id);
			$post->post_title = Input::get('title');
			$post->post_text = Input::get('text');
			$post->save();
			foreach ($post->tags()->get() as $key => $tag) {
				$tag->delete();
			}
			$tags = explode(',', Input::get('tags'));
			foreach($tags as $value)
			{
				$value = trim($value);
				$tag = new Tag;
				$tag->post_id = $post->id;
				$tag->tag_text = $value;
				$tag->save();
			}
			return Redirect::to('/');
		}
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$post = Post::find($id);
		$tags = $post->tags()->get();
		foreach ($tags as $key => $tag) {
			$tag->delete();
		}
		$post->delete();
		return Redirect::to('/');
	}


}
