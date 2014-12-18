@extends('layout')

@section('content')
	@if(count($posts) > 0)
		<h1 class="text-center">Posts containing "{{ $search }}" in the title: </h1>
		@foreach($posts as $post)
			<article>
			    <h2 class="text-center"><a href="{{url('/post',$post->id)}}">{{$post->post_title}}</a></h2>
			    <p>
			    	<span><span class="glyphicon glyphicon-time"></span> {{ date('j M Y h:i', strtotime($post->created_at)) }}</span>
			    	<span class="pull-right"><span class="glyphicon glyphicon-pencil"></span>{{ count($post->comments) . ' Comments'}}</span>
			    </p>
		    </article>
		@endforeach
	@else
		<h1>There are no similar posts!</h1>
	@endif
@stop