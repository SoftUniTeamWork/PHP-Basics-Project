@extends('layout')

@section('content')
	<section>
	@if(Auth::check())
	<a href="{{url('/post/create')}}" class="button green">Create post</a>
	@endif
	@foreach($posts as $post)
		<section>
			<h3><a href="{{ url('/post/' . $post->id) }}">{{ $post->post_title }}</a></h3>
			<h6>Posted by: {{ $post->user->name }}</h6>
			<p>{{ $post->post_text }}</p>
			<p>
				@foreach($post->tags()->get() as $tag)
					{{$tag->tag_text}}
				@endforeach
			</p>
			<p>
				@foreach($post->comments()->get() as $comment)
					<br/>{{$comment->comment_text}}
				@endforeach
			</p>
			@if(Auth::check())
				@if(Auth::user()->id == $post->user_id || Auth::user()->user_level == '1')
					<a href="{{ url('/post/delete/' . $post->id) }}" class="button orange right">Delete</a>
					<a href="{{ url('/post/edit/' . $post->id) }}" class="button green right">Edit</a>
					<a id="commentButton{{ $post->id }}" class="button blue right toggle">Comment this post</a>
					<form id="commentBox{{ $post->id }}" class="hide" method="post" action="{{ url('/post/' . 'comment/' . $post->id) }}">
						Comment: <textarea name="text"></textarea>
						<input type="submit" value="Comment" class="button blue"/>
					</form>
				@endif
			@endif
			
		</section>
	@endforeach
	</section>
	<script src="{{ URL::asset('js/blog.js') }}"></script>
	@include('includes.sidebar')
@stop