@extends('layout')

@section('content')
	<h1>Team<span class="label label-default">London</span></h1>
	<section class="container col-lg-12" id="staff">
        <article class="row">
            <div class="col-lg-4"><img class="img-responsive" src="{{ URL::asset('images/images.png') }}" alt=""/></div>
            <div class="col-lg-8">
                <h2>Deivid Raychev</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
        </article>

        <article class="row">
            <div class="col-lg-4"><img class="img-responsive" src="{{ URL::asset('images/images.png') }}" alt=""/></div>
            <div class="col-lg-8">
                <h2>Georgi Stoyanov</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
        </article>

        <article class="row">
            <div class="col-lg-4"><img class="img-responsive" src="{{ URL::asset('images/images.pngg') }}" alt=""/></div>
            <div class="col-lg-8">
                <h2>Stoyan Stoyanov</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
        </article>

        <article class="row">
            <div class="col-lg-4"><img class="img-responsive" src="{{ URL::asset('images/images.png') }}" alt=""/></div>
            <div class="col-lg-8">
                <h2>Emil Petrov</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
        </article>
    </seciton>
@stop