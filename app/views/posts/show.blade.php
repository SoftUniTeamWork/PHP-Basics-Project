@extends('layout')

@section('content')
	@if(isset($post))
		<h3>{{ $post->post_title }}</h3>
		<h6>Posted by: {{ User::find($post->user_id)->name }}</h6>
		<p>{{ $post->post_text }}</p>
		<p>
			@foreach(Tag::where('post_id', '=', $post->id)->get() as $index => $tag)
				{{$tag->tag_text}}
			@endforeach
		</p>
		<section>
			@foreach(Comment::where('post_id', '=', $post->id)->get() as $index => $comment)
				<span>Commented by: {{User::find($comment->user_id)->name}}</span>
				<p>
					{{$comment->comment_text}}
				</p>
			@endforeach
		</section>
	@else
		<h1>This post does not exist!</h1>
	@endif
@stop