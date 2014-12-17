@extends('layout')

@section('content')
	@if(isset($user))
	<section class="userPanel">
        <div class=" col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 " >
          <div class="panel panel-info">
            <div class="panel-heading">
              <h1 class="panel-title"><span class="badge">{{$user->username}}</span></h1>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-6 col-lg-6 " align="center">
                    <img alt="User Pic" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=100" class="img-circle">
                </div>
                <div class=" col-md-9 col-lg-9 ">
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Name:</td>
                        <td>@if($user->name) {{$user->name}} @else {{'not set'}} @endif</td>
                      </tr>
                      <tr>
                        <td>Age:</td>
                        <td>@if($user->age) {{$user->age}} @else {{'not set'}} @endif</td>
                      </tr>
                      <tr>
                        <td>Email:</td>
                        <td>@if($user->email) {{$user->email}} @else {{'not set'}} @endif</td>
                      </tr>
                      <tr>
                        <td>Total comments:</td>
                        <td>{{ count($user->comments) }}</td>
                      </tr>
                    </tbody>
                  </table>
                  <a href="{{ url('/user/' . $user->username . '/comments') }}" class="btn btn-primary">View all commented posts</a>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
	@else
		<h1>This user does not exist!</h1>
	@endif
@stop
