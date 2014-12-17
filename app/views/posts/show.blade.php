@extends('layout')
 
@section('content')
    @if(isset($post))
            <article>
            <h2><a href="{{ url('/post/' . $post->id) }}">{{ $post->post_title }}</a></h2>
            <section class="row">
                <section class="group1 col-sm-6 col-md-6">
                    <span class="glyphicon glyphicon-user"></span>Posted by: <a href="{{ url('/user/' . $post->user->username) }}"><span class="badge">{{ $post->user->username }}</span></a>
                    
                </section>
                <section class="group2 col-sm-6 col-md-6">
                    <span class="glyphicon glyphicon-pencil"></span>{{ count($post->comments()->get()) . ' Comments'}}                           
                    <span class="glyphicon glyphicon-time"></span> {{ date('j M Y', strtotime($post->created_at)) }}                        
                </section>
            </section>
            <section class="textPanel container col-lg-12">{{ $post->post_text }}</section>
            <p>
                <span class="glyphicon glyphicon-tag"></span>
                    @for($j = 0; $j < count($tags); $j++)
                        @if($j == count($tags) - 1)
                            <a href="{{ url('/searchByTag/' . $tags[$j]) }}">{{ $tags[$j] }} </a>
                        @else
                            <a href="{{ url('/searchByTag/' . $tags[$j]) }}">{{ $tags[$j] }} </a> {{ ', ' }}
                        @endif
                    @endfor
            </p>
            <div class="btn-group" role="group" aria-label="...">
                @if(Auth::check())
                    @if(Auth::user()->id == $post->user_id || Auth::user()->user_level == '1')
                        <a href="{{ url('/post/delete/' . $post->id) }}" class="btn btn-default">Delete</a>
                        <a href="{{ url('/post/edit/' . $post->id) }}" class="btn btn-default">Edit</a>
                    @endif
                @endif
            </div>
        </article>
        <section class="postComments">
            <h2>Comments</h2>
            @foreach($comments as $comment)
                <section class="comment">
                    <section>
                    <h4>Commented by: 
                        @if($comment->comment_type == '0')
                            <a href="{{ url('/user/' . $comment->user->username) }}">{{ $comment->user->name . '(' . $comment->user->username . ')' }}</a>
                             <div class="btn-group" role="group" aria-label="...">
                                @if(Auth::check())
                                    @if(Auth::user()->id == $comment->user_id || Auth::user()->user_level == '1')
                                        <a href="{{ url('/comment/delete/' . $comment->id) }}" class="btn btn-default deleteWarning">Delete</a>
                                        <a href="{{ url('/comment/edit/' . $comment->id) }}" class="btn btn-default">Edit</a>
                                    @endif
                                @endif
                            </div>
                        @else
                            {{ $comment->author_name }}
                             @if(Auth::user()->user_level == '1')
                             <div class="btn-group" role="group" aria-label="...">
                                <a href="{{ url('/comment/delete/' . $comment->id) }}" class="btn btn-default deleteWarning">Delete</a>
                                <a href="{{ url('/comment/edit/' . $comment->id) }}" class="btn btn-default">Edit</a>
                            </div>
                            @endif
                        @endif
                    </h4>
                    </section>
                    <p>
                        {{$comment->comment_text}}
                    </p>
                </section>
            @endforeach
            <section class="pagination">{{ $comments->links() }}</section>
            <form class="commentBox" role="form" method="post" action="{{ url('/post/' . 'comment/' . $post->id) }}">
                {{ $errors->first('name') }}
                {{ $errors->first('text') }}
            @if(!Auth::check())
                <input type="text" class="form-control" name="name" placeholder="Name" required/>
                <input type="email" class="form-control" name="email" placeholder="Email(optional)"/>
            @endif
            <textarea class="form-control" name="text" required></textarea>
            <input type="submit" class="form-control" value="Comment" class="btn btn-default"/>
        </form>
        </section>
    @else
       	<h1>This post does not exist!</h1>
    @endif
@stop

