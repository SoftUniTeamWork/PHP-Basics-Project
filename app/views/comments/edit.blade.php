@extends('layout')

@section('content')
	<form method="post" action="{{ url('/comment/edit/' . $comment->id) }}">
		<textarea class="form-control" name="text">{{ $comment->comment_text }}</textarea>
		<button type="submit" class="form-control btn btn-default">Save changes</button>
	</form>
@stop