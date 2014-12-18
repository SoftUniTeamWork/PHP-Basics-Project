<?php

class UsersController extends \BaseController {

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
	public function create()
	{
        $input = Input::all();
        $rules = array (
            'username' => 'required|min:4|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6'
        );
        $validator = Validator::make($input, $rules);

        if($validator -> fails())
        {
            return Redirect::to('/registration')->withErrors($validator);
        }
        else
        {
            $user = new User;
            $user -> username = Input::get('username');
            $user -> email = Input::get('email');
            $user -> password = Hash::make(Input::get('password'));
            $user -> name = Input::get('name');
			$age = DateTime::createFromFormat('d/m/Y', Input::get('age'), new DateTimeZone('Europe/Sofia'))
			     ->diff(new DateTime('now', new DateTimeZone('Europe/Sofia')))
			     ->y;
			$user->age = $age;
            $user -> save();
            return Redirect::to('/login');
        }
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
    public function store()
    {

    }


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($username)
	{
		$user = User::where('username', '=', $username)->first();
		return View::make('users.show')->withUser($user);
	}

	public function showAllComments($username)
	{
		$user = User::where('username', '=', $username)->first();
		
		$comments = Comment::where('user_id', '=', $user->id)->paginate(5);
		return View::make('users.showComments')->withComments($comments)->withUser($user);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($username)
	{
		$user = Auth::user();
		$rules = array('name' => 'min:5');
		$validator = Validator::make(Input::all(), $rules);
		if($validator->fails())
		{
			return Redirect::to('/user/' . $user->username . 'edit')->withErrors($validator);
			var_dump($validator);
		}
		else
		{
			$user->name = Input::get('name');
			$user->save();
			return Redirect::to('/user/' . $user->username);
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
		//
	}



}
