@extends('layout')

@section('content')
	@if(Auth::check())
	@if(Auth::user()->id == $post->user_id || Auth::user()->user_level == '1')
	<form method="post">
		<p>
			<label for="title">Title</label>
			<input type="text" name="title" value="{{ $post->post_title }}" />
		</p>
		<p>
			<label for="text">Text</label>
			<textarea name="text">{{ $post->post_text }}</textarea>
		</p>
		<p>
			<label for="tags">Tags</label>
			<input type="text" name="tags" value="">
		</p>
		<input type="submit" value="Save changes">
	</form>
	@endif
	@endif
@stop