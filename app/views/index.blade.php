@extends('layout')

@section('content')
	@foreach($posts as $key => $value)
	<h2>Title - {{$value->post_title}}</h2>
	<p>{{$value->post_text}}</p>
	@endforeach
@stop