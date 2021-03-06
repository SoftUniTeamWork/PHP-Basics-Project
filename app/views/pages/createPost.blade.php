@extends('layout')

@section('content')
	@if(Auth::check() && Auth::user()->user_level == '1')
		<form method="post" action="{{url('/post/create')}}">
			<div class="input-group input-group-lg">
				<label for="title"><h2>Title</h2></label>
				<input type="text" name="title" class="form-control"/>
			</div>
			<p>
				<label for="editor1">Text</label>
				<textarea name="text" id="editor1" rows="10" cols="80">

                            </textarea>
                            <script>
                                // Replace the <textarea id="editor1"> with a CKEditor
                                // instance, using default configuration.
                                CKEDITOR.replace( 'editor1' );
                            </script>
			</p>
			<p>
				<label for="tags">Tags</label>
				<input type="text" name="tags">
			</p>
			<input type="submit" class="btn btn-default" value="Create Post">
		</form>
		@else
		<h1>You don't have the rights to create posts!</h1>
	@endif
@stop