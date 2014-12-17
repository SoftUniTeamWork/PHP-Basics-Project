@extends('layout')

@section('content')
	@if(count($posts) > 0)
		@foreach($posts as $post)
			<article>
			    <h2 class="text-center"><a href="{{url('/post',$post->id)}}">{{$post->post_title}}</a></h2>
			    <p><span>Create date: {{ date('j M Y h:i', strtotime($post->created_at)) }}</span></p>
		    </article>
		@endforeach
	@else
		<h1>There are no similar posts!</h1>
	@endif
@stop