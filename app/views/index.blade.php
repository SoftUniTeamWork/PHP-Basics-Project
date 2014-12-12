@extends('layout')

@section('content')
	@foreach($users as $key => $value)
		@if($value['user_type'] == '1')
		<h1>This is Admin</h1>
		@endif
		<h2>{{$value['user_id']}}</h2>
	@endforeach
@stop