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
	
	<form action="post">
	    <h1>Registration form</h1>
	    
	    <p>
	        <label for="userName">User Name</label>
	        <input type="text" name="userName"/>
	    </p>
	    <p>
	        <label for="email">Email</label>
	        <input type="text" name="email"/>
	    </p>
	    <p>
	        <label for="passowrd">Password</label>
	        <input type="password" name="password"/>
	    </p>
	    <p>
        	 <label for="passowrd">Repeat Password</label>
             <input type="password" name="passwordRepeat"/>
        </p>
        <p>
        	 <input type="submit" value="Submit">
        </p>
	</form>
@stop