@extends('layout')

@section('content')
	<form method="post" action="{{URL::to('pages.login')}}">
		<h1>Login</h1>
		<p><!-- {{ $errors->first('email') }} {{ $errors->('password') }} --></p>
		<p>
			<label for="email">Email Addess</label>
			<input type="text" name="email"/>
		</p>
		<p>
			<label for="password">Password</label>
			<input type="password" name="password"/>
		</p>
		<p>
			<input type="submit" value="Submit">
		</p>
	</form>
@stop