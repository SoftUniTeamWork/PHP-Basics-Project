@extends('layout')

@section('content')

@foreach($posts as $post)
    <p><a href="{{url('/post',$post->id)}}">{{$post->post_title}}</a></p>
    <p>{{$post->created_at}}</p>
@endforeach

@stop