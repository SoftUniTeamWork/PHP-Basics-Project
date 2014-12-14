@extends('layout')

@section('content')
	<form method="post">
		<h1>Login</h1>
		<p>
			{{ $errors->first('email') }}
			{{ $errors->first('password') }}
		</p>
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
	
	{{ Form::open(array('url' => 'registration')) }}

            <p>User Name :</p>

            <p>{{ Form::text('username') }}</p>

            <p>Email :</p>

            <p>{{ Form::text('email') }}</p>

            <p>Password :</p>

            <p>{{ Form::password('password') }}</p>

             <p>Name:</p>

             <p>{{ Form::text('name') }}</p>

             <p>Age:</p>

             <p>{{ Form::text('age') }}</p>

            <p>{{ Form::submit('Submit') }}</p>


    {{ Form::close() }}
@stop