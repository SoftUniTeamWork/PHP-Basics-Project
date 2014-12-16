@extends('layout')

@section('content')

 <form action="{{ url('/registration') }}" class="text-center" method="POST" role="form">
      <section class="form-group">
          <label for="username">User Name :</label>
          <input type="text" class="form-control col-lg-5" name="username" required>
      </section>
      <section class="form-group">
          <label for="email">Email :</label>
          <input type="email" class="form-control" name="email" required>
      </section>
      <section class="form-group">
          <label for="password">Password :</label>
          <input type="password" class="form-control" name="password" required>
      </section>
      <section class="form-group">
          <label for="name">Name:</label>
          <input type="text" class="form-control" name="name" >
      </section>
      <section class="form-group">
          <label for="name">Age:</label>
          <input type="text" class="form-control" name="age" >
      </section>
     <input type="submit" value="Register" class="btn btn-default">
     </form>
@stop