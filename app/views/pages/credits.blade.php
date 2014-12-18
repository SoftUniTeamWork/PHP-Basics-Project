@extends('layout')

@section('content')
	<h1><span class="label label-default">Team London</span></h1>
	<section class="container col-lg-12" id="staff">
        <article class="row">
            <div class="col-lg-4"><img class="img-responsive" src="{{ URL::asset('images/deiv.png') }}" alt=""/></div>
            <div class="col-lg-8">
                <h2>Deivid Raychev</h2>
                <p>Deivid is the team leader. He came up with the idea to use Laravel because it would ease our work. He made most of the functionality of the site, made some styilisation and all in all was the mind behind the project.</p>
                </div>
        </article>

        <article class="row">
            <div class="col-lg-4"><img class="img-responsive" src="{{ URL::asset('images/georgi.png') }}" alt=""/></div>
            <div class="col-lg-8">
                <h2>Georgi Stoyanov</h2>
                <p>Despite going to work during weekdays he contributed significantly to the project. He did a big part of the  of the functionality, design and stylisation. He wrote the basis of the registration and search forms. </p>
            </div>
        </article>

        <article class="row">
            <div class="col-lg-4"><img class="img-responsive" src="{{ URL::asset('images/stoyan.jpg') }}" alt=""/></div>
            <div class="col-lg-8">
                <h2>Stoyan Stoyanov</h2>
                <p>He put a lot of time and effort  to understand the way the Laravel framework works and made some of the functionality of the sidebar. Created a big part of the pages' design and  stylisation.</p>
            </div>
        </article>

        <article class="row">
            <div class="col-lg-4"><img class="img-responsive" src="{{ URL::asset('images/emo.jpg') }}" altemo.jpg=""/></div>
            <div class="col-lg-8">
                <h2>Emil Petrov</h2>
                <p>He didn't contribute with anything significant to the project. </p>
            </div>
        </article>
    </section>
@stop