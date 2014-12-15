@extends('layout')
 
@section('content')
    @if(isset($post))
            <h3>{{ $post->post_title }}</h3>
            <h6>Posted by: {{ $post->user->name }}</h6>
            <p>{{ $post->post_text }}</p>
            <p>
                    @foreach($post->tags()->get() as $tag)
                       	{{$tag->tag_text}}
                    @endforeach
            </p>
            <section>
                    @foreach($post->comments as $comment)
                            <span>Commented by: {{ $comment->user->name}}</span>
                            <p>
                               	{{$comment->comment_text}}
                            </p>
                    @endforeach
            </section>
    @else
       	<h1>This post does not exist!</h1>
    @endif
@stop

