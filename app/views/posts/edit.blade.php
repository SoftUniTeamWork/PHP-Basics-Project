@extends('layout')

@section('content')
	@if(Auth::check())
	@if(Auth::user()->id == $post->user_id || Auth::user()->user_level == '1')
	<form method="post">
		<div class="input-group input-group-lg">
			<label for="title"><h2>Title</h2></label>
			<input type="text" name="title" class="form-control" value="{{ $post->post_title }}"/>
		</div>
		<p>
			<label for="text">Text</label>
			<textarea name="text" id="text" rows="10" cols="80">
                {{ $post->post_text }}
             </textarea>
             <script>
                 // Replace the <textarea id="editor1"> with a CKEditor
                 // instance, using default configuration.
                 CKEDITOR.replace( 'text' );
             </script>

		</p>
		<p>
			<label for="tags">Tags</label>
			<input type="text" name="tags" id="tags" value="{{ implode(', ', $post->tags()->get()->lists('tag_text')) }}">
		</p>
		<input type="submit" value="Save changes">
	</form>
	@endif
	@endif
@stop