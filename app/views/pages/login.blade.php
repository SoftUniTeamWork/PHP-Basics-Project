@extends('layout')

@section('content')
	@if(!Auth::check())
	<form method="post">
		<h1>Login</h1>
		<section class="form-group">
			<label for="email">Email Addess</label>
			<input type="email" name="email" required/>
		</section>
		<section class="form-group">
			<label for="password">Password</label>
			<input type="password" name="password" required/>
		</section>
		<section class="form-group">
			<input type="submit" value="Login" class="btn btn-default">
		</section>
	</form>
	@else
		<h1>You are already logged in!</h1>
	@endif
@stop