@extends('layout')

@section('content')
@if($posts)
<h1 class="text-center">{{ $tag }}</h1>
@foreach($posts as $post)
	<article>
	    <h2 class="text-center"><a href="{{url('/post',$post->id)}}">{{$post->post_title}}</a></h2>
	    <p>
	    	<span><span class="glyphicon glyphicon-time"></span> {{ date('j M Y h:i', strtotime($post->created_at)) }}</span>
	    	<span class="pull-right"><span class="glyphicon glyphicon-pencil"></span>{{ count($post->comments) . ' Comments'}}</span>
	    </p>
    </article>
@endforeach
@else
<h1>This tag does not exist!</h1>
@endif
@stop