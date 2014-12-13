@extends('layout')

@section('content')
	<main class="center">
		<section>
		@if(Auth::check())
		<a href="{{url('/post/create')}}" class="button green">Create post</a>
		@endif
		@foreach($posts as $key => $value)
			<section>
				<h3>{{ $value->post_title }}</h3>
				<h6>Posted by: {{ User::find($value->user_id)->name }}</h6>
				<p>{{ $value->post_text }}</p>
				<p>
					@foreach(Tag::where('post_id', '=', $value->id)->get() as $index => $tag)
						{{$tag->tag_text}}
					@endforeach
				</p>
				@if(Auth::check())
					@if(Auth::user()->id == $value->user_id)
						<a href="{{ url('/post/delete/' . $value->id) }}" class="button orange right">Delete</a>
					@endif
				@endif
			</section>
		@endforeach
		</section>
		@include('includes.sidebar')
	</main>
@stop