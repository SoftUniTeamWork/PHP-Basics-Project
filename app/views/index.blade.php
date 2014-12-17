@extends('layout')

@section('content')
	<section>
	@foreach($posts as $post)
		<article>
			<h2><a href="{{ url('/post/' . $post->id) }}">{{ $post->post_title }}</a></h2>
		    <section class="row">
		        <section class="group1 col-sm-6 col-md-6">
		        	<span class="glyphicon glyphicon-user"></span>Posted by: <a href="{{ url('/user/' . $post->user->username) }}">{{ $post->user->username }}</a>
					
		        </section>
		        <section class="group2 col-sm-6 col-md-6">
					<span class="glyphicon glyphicon-pencil"></span>{{ count($post->comments()->get()) . ' Comments'}}
					<span class="glyphicon glyphicon-time"></span> {{ date('j M Y', strtotime($post->created_at)) }}                        
		        </section>
		    </section>
			<section class="textPanel container col-lg-12">
				@if(strlen($post->post_text) > 800) 
					{{ substr($post->post_text, 0, 800) . ' ...' }}
				@else
					{{ $post->post_text }}
				@endif
			</section>
			<p>
				<span class="glyphicon glyphicon-tag"></span>
					{{ implode(', ', $post->tags()->get()->lists('tag_text')) }}
			</p>
			<div class="btn-group" role="group" aria-label="...">
				@if(Auth::check())
					@if(Auth::user()->id == $post->user_id || Auth::user()->user_level == '1')
						<a href="{{ url('/post/delete/' . $post->id) }}" class="btn btn-default deleteWarning">Delete</a>
						<a href="{{ url('/post/edit/' . $post->id) }}" class="btn btn-default">Edit</a>
					@endif
				@endif
			</div>
		</article>
	@endforeach
		<a href="{{ url('/page/{num}') }}" class="btn btn-default">Previous</a>
	</section>
	<script src="{{ URL::asset('js/blog.js') }}"></script>
@stop