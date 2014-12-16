@extends('layout')

@section('content')
	<section>
	{{var_dump($numPosts)}}
	@foreach($posts as $post)
		<article>
			<h2><a href="{{ url('/post/' . $post->id) }}">{{ $post->post_title }}</a></h2>
		    <section class="row">
		        <section class="group1 col-sm-6 col-md-6">
		        	<span class="glyphicon glyphicon-user"></span>Posted by: {{ $post->user->name }}
					
		        </section>
		        <section class="group2 col-sm-6 col-md-6">
					<span class="glyphicon glyphicon-pencil"></span> <a href="#">{{ count($post->comments()->get()) . ' Comments'}}</a>                            
					<span class="glyphicon glyphicon-time"></span> {{ date('j M Y', strtotime($post->created_at)) }}                        
		        </section>
		    </section>
			<p class="textPanel">{{ $post->post_text }}</p>
			<p>
				<span class="glyphicon glyphicon-tag"></span>
					@foreach($post->tags()->get() as $tag)  
						<a href="#">{{ $tag->tag_text }}</a> 
					@endforeach
			</p>
			<div class="btn-group" role="group" aria-label="...">
				@if(Auth::check())
					@if(Auth::user()->id == $post->user_id || Auth::user()->user_level == '1')
						<a href="{{ url('/post/delete/' . $post->id) }}" class="btn btn-default">Delete</a>
						<a href="{{ url('/post/edit/' . $post->id) }}" class="btn btn-default">Edit</a>
					@endif
					<a id="commentButton{{ $post->id }}" class="btn btn-default">Comment this post</a>
					<form id="commentBox{{ $post->id }}" class="hide" method="post" action="{{ url('/post/' . 'comment/' . $post->id) }}">
							Comment: <textarea name="text"></textarea>
							<input type="submit" value="Comment" class="button blue"/>
					</form>
				@else
					<form id="commentBox{{ $post->id }}" class="hide" method="post" action="{{ url('/post/' . 'comment/' . $post->id) }}">
							Comment: <textarea name="text"></textarea>
							<input type="submit" value="Comment" class="button blue"/>
					</form>
				@endif
			</div>
		</article>
	@endforeach
	</section>
	<script src="{{ URL::asset('js/blog.js') }}"></script>
@stop