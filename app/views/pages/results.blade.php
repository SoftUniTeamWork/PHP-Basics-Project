@extends('layout')

@section('content')

@foreach($posts as $index => $post)
    <p><a href="{{url('/',$post->id)}}">{{$post->post_title}}</a></p>
    <p>{{$post->created_at}}</p>
@endforeach

@stop