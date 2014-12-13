@extends('layout')

@section('content')
	<form method="post" action="{{url('/created')}}">
		title<input type="text" name="title" />
		text<input type="text" name="text">
		personName<input type="text" name="personName">
		<input type="submit" name="submit" value="Create Post">
	</form>
@stop