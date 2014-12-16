@extends('layout')

@section('content')
<div>
 <form action="{{ url('/registration') }}" class="text-center" method="POST" role="form" id="registerForm">
      <section class="form-group">
          <label for="username">User Name :</label>
          <input type="text" class="form-control " name="username" required>
      </section>
      <section class="form-group">
          <label for="email">Email :</label>
          <input type="email" class="form-control" name="email" required placeholder="example@address.com">
      </section>
      <section class="form-group">
          <label for="password">Password :</label>
          <input type="password" class="form-control" name="password" required>
      </section>
      <section class="form-group">
          <label for="name">Name:</label>
          <input type="text" class="form-control" name="name">
      </section>
      <section class="form-group">
          <label for="name">Age:</label>
          <input type="text" class="form-control" name="age">
      </section>
     <input type="submit" value="Registration" class="btn btn-default text-center registration">
     </form>
</div>
@stop