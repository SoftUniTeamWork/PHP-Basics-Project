@extends('layout')

@section('content')
	<section>
	@if(Auth::check())
	<a href="{{url('/post/create')}}" class="button green">Create post</a>
	@endif
	@foreach($posts as $key => $post)
		<section>
			<h3>{{ $post->post_title }}</h3>
			<h6>Posted by: {{ User::find($post->user_id)->name }}</h6>
			<p>{{ $post->post_text }}</p>
			<p>
				@foreach(Tag::where('post_id', '=', $post->id)->get() as $index => $tag)
					{{$tag->tag_text}}
				@endforeach
			</p>
			@if(Auth::check())
				@if(Auth::user()->id == $post->user_id || Auth::user()->user_level == '1')
					<a href="{{ url('/post/delete/' . $post->id) }}" class="button orange right">Delete</a>
					<a href="{{ url('/post/edit/' . $post->id) }}" class="button green right">Edit</a>
					<a href="{{ url('/post/' . $post->id . '/comment') }}" class="button blue right">Comment this post</a>
				@endif
			@endif
			
		</section>
	@endforeach
	</section>
	@include('includes.sidebar')
@stop