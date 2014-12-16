@extends('layout')

@section('content')
	<section>
		<h1>Username - {{$user->username}}</h1>
		<p>Name - @if($user->name) {{$user->name}} @else {{'not set'}} @endif</p>
		<p>Age - @if($user->age) {{$user->age}} @else {{'not set'}} @endif</p>
	</section>
@stop