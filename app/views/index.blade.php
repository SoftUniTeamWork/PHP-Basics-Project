@extends('layout')

@section('content')
	@if(Auth::check())
	@foreach($posts as $key => $value)
	<h2>Title - {{$value->post_title}}</h2>
	<p>{{$value->post_text}}</p>
	@endforeach
	<a href="{{url('/logout')}}">Logout</a>
	@else
	<a href="{{url('/login')}}">Login</a>
	@endif
@stop