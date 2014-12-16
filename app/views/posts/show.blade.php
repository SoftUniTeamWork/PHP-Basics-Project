@extends('layout')
 
@section('content')
    @if(isset($post))
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
                    {{ implode(', ', $post->tags()->get()->lists('tag_text')) }}
                    
            </p>
            <div class="btn-group" role="group" aria-label="...">
                @if(Auth::check())
                    @if(Auth::user()->id == $post->user_id || Auth::user()->user_level == '1')
                        <a href="{{ url('/post/delete/' . $post->id) }}" class="btn btn-default">Delete</a>
                        <a href="{{ url('/post/edit/' . $post->id) }}" class="btn btn-default">Edit</a>
                    @endif
                    <a id="commentButton{{ $post->id }}" class="btn btn-default toggleButton">Comment this post</a>
                    <form id="commentBox{{ $post->id }}" class="commentBoxToggled" method="post" action="{{ url('/post/' . 'comment/' . $post->id) }}">
                        <section><textarea name="text"></textarea></section>
                        <input type="submit" value="Comment" class="button blue"/>
                    </form>
                @else
                    <a id="commentButton{{ $post->id }}" class="btn btn-default toggleButton">Comment this post</a>
                    <form id="commentBox{{ $post->id }}" class="commentBoxToggled" method="post" action="{{ url('/post/' . 'comment/' . $post->id) }}">
                    <input type="text" name="name"/><input type="email" name="email"/>
                        <section><textarea name="text"></textarea></section>
                        <input type="submit" value="Comment" class="button blue"/>
                    </form>
                @endif
            </div>
        </article>
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

