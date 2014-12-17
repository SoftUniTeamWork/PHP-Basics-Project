@extends('layout')

@section('content')
	<section>
	@for($i = 0; $i < count($posts); $i++)
		<article>
			<h2><a href="{{ url('/post/' . $posts[$i]->id) }}">{{ $posts[$i]->post_title }}</a></h2>
		    <section class="row">
		        <section class="group1 col-sm-6 col-md-6">
		        	<span class="glyphicon glyphicon-user"></span>Posted by: <a href="{{ url('/user/' . $posts[$i]->user->username) }}"><span class="badge  ">{{ $posts[$i]->user->username }}</span></a>
					
		        </section>
		        <section class="group2 col-sm-6 col-md-6">
					<span class="glyphicon glyphicon-pencil"></span> <a href="#">{{ count($posts[$i]->comments()->get()) . ' Comments'}}</a>                            
					<span class="glyphicon glyphicon-time"></span> {{ date('j M Y', strtotime($posts[$i]->created_at)) }}                        
		        </section>
		    </section>
			<section class="textPanel container col-lg-12">
				@if(strlen($posts[$i]->post_text) > 800) 
					{{ substr($posts[$i]->post_text, 0, 800) . ' ...' }}
				@else
					{{ $posts[$i]->post_text }}
				@endif
			</section>
			<p>
				<span class="glyphicon glyphicon-tag"></span>
					@for($j = 0; $j < count($tags[$i]); $j++)
						@if($j == count($tags[$i]) - 1)
							<a href="{{ url('/searchByTag/' . $tags[$i][$j]) }}">{{ $tags[$i][$j] }} </a>
						@else
							<a href="{{ url('/searchByTag/' . $tags[$i][$j]) }}">{{ $tags[$i][$j] }} </a> ,
						@endif
					@endfor

			</p>
			<div class="btn-group" role="group" aria-label="...">
				@if(Auth::check())
					@if(Auth::user()->id == $posts[$i]->user_id || Auth::user()->user_level == '1')
						<a href="{{ url('/post/delete/' . $posts[$i]->id) }}" class="btn btn-default deleteWarning">Delete</a>
						<a href="{{ url('/post/edit/' . $posts[$i]->id) }}" class="btn btn-default">Edit</a>
					@endif
				@endif
			</div>
		</article>
	@endfor
		<section class="pagination"> {{ $posts->links() }} </section>
	</section>
	<script src="{{ URL::asset('js/blog.js') }}"></script>
@stop