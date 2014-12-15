<nav class="navbar navbar-inverse" role="navigation">
	<ul class="nav navbar-nav">
		<li><a href="{{url('/')}}">Home</a></li>
		<li><a href="{{url('/about')}}">About</a></li>
		<li><a href="{{url('/contacts')}}">Contacts</a></li>
		<li><a href="{{url('/credits')}}">Credits</a></li>
	</ul>
	@if(Auth::check())
		<div class="input-group input-group-sm pull-right">
			<a href="{{url('/post/create')}}" class="btn btn-default form-control" >Create post</a>
			<a href="{{url('/logout')}}" class="btn btn-primary form-control">Logout</a>
		</div>
		
		
		
		@else
		<form method="post" action="{{url('/login')}}" class="navbar-form navbar-right">
			{{ $errors->first('email') }}
			{{ $errors->first('password') }}
			<div class="input-group input-group-sm">
				  <span class="input-group-addon">@</span>
				  <input type="email" class="form-control" placeholder="Email" name="email">
			</div>
			<div class="input-group input-group-sm">
				  <span class="input-group-addon glyphicon glyphicon-lock"></span>
				  <input type="password" class="form-control" placeholder="Password" name="password">
			</div>
			<input type="submit" value="Login" class="btn btn-primary">
		</form>
	@endif
	<!-- search  -->
<!-- 	<form action="{{ url('/results') }}" method="GET">
	        <input id="search" type="text" placeholder="Type here" name="search">
	        <input id="submit" type="submit" value="Search">
	</form> -->
</nav>