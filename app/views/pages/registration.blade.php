@extends('layout')

@section('content')

 <form action="{{ url('/registration') }}" method="POST">
     <p>User Name :</p>

     <p>{{ Form::text('username') }}</p>

     <p>Email :</p>

     <p>{{ Form::text('email') }}</p>

     <p>Password :</p>

     <p>{{ Form::password('password') }}</p>

      <p>Name:</p>

      <p>{{ Form::text('name') }}</p>

      <p>Age:</p>

      <p>{{ Form::text('age') }}</p>

     <p>{{ Form::submit('Submit') }}</p>

     </form>
@stop