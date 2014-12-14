<ul class="breadcrumbs alt1">
<li><a href="{{url('/')}}">Home</a></li>
<li><a href="{{url('/about')}}">About</a></li>
<li><a href="{{url('/contacts')}}">Contacts</a></li>
<li><a href="{{url('/credits')}}">Credits</a></li>
@if(Auth::check())
<a href="{{url('/logout')}}" class="right button red">Logout</a>
@else
<a href="{{url('/login')}}" class="right button blue">Login</a>
@endif
</ul>