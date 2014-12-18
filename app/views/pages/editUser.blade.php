@extends('layout')

@section('content')
	<section class="userPanel">
		<form method="post">
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
                        <td><input type="text" name="name" value="@if($user->name) {{$user->name}} @else {{''}} @endif"/></td>
                      </tr>
                      <tr>
                        <td>Age: </td>
                        <td>@if($user->age) {{$user->age}} @else {{''}} @endif</td>
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
                 <span>
                  @if(Auth::check() && Auth::user()->username == $user->username)
                      <input type="submit" value="Save changes" class="btn btn-default form-control">
                  @endif
              	</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        </form>
    </section>
@stop