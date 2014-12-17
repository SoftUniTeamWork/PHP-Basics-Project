@extends('layout')

@section('content')
	@if($user)
		<h1 class="text-center">{{ $user->username }}<span> Comments</span></h1>
		@foreach($comments as $comment)
			<article class='comment'>
				<h3>Post Title: <a href="{{ url('/post/' . $comment->post->id) }}">{{ $comment->post->post_title }}</a></h3>
				<h4>Comment: <span class="pull-right"><span class="glyphicon glyphicon-time"></span> {{ date('j M Y h:i', strtotime($comment->created_at)) }}</span></h4>
				<p>{{ $comment->comment_text }}</p>
			</article>
		@endforeach
		<section class="pagination">{{ $comments->links() }}</section>
	@else
		<h1>This user does not exists!</h1>
	@endif
@stop