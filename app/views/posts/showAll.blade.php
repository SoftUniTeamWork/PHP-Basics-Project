@extends('layout')

@section('content')
	@foreach($posts as $key => $value)
		<section>
			<h2>Title: {{$key . ' ' . $value}}</h2>
		</section>
	@endforeach
@stop