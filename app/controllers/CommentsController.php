<?php

class CommentsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($post_id)
	{
		$rules = array();
		if(Auth::check())
			$rules = array('text' => 'required|min:3');
		else
			$rules = array('text' =>'required|min:3',
							'name' => 'required|min:4');
		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails())
		{
			return Redirect::to('/post/' . $post_id)->withErrors($validator);
		}
		else
		{
			$comment = new Comment;
			$comment->post_id = $post_id;
			$comment->comment_text = Input::get('text');
			if(Auth::check()){
				$comment->user_id = Auth::user()->id;
				$comment->comment_type = 0;
				$comment->author_name = Auth::user()->name;
			}
			else
			{
				$comment->comment_type = 1;
				$comment->author_name = Input::get('name');
			}
			$comment->save();
			return Redirect::to('/post/' . $post_id);
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
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$comment = Comment::find($id);
		if(Auth::check() && (Auth::user()->id == $comment->user_id || Auth::user()->user_level == '1'))
		{
			$comment->comment_text = Input::get("text");
			$comment->save();
			return Redirect::to('/post/' . $comment->post_id);
		}
		else
		{
			return Redirect::to('pages.pageNotFound');
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
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$comment = Comment::find($id);
		if(Auth::check() && (Auth::user()->id == $comment->user_id || Auth::user()->user_level == '1'))
		{
			$postId = $comment->post_id;
			$comment->delete();
			return Redirect::to('/post/' . $postId);
		}
		else
		{
			return Redirect::to('pages.pageNotFound');
		}
	}


}
