<!DOCTYPE html>
<html>
<head>
	@include('includes.head')
</head>
<body>
	<div class="container">
		<header class="col-lg-12">
			@include('includes.header')
		</header>
		<main class="text-left col-md-8">
			@yield('content')
		</main>
		<aside class="text-right col-md-4">
			@include('includes.sidebar')
		</aside>
		<footer class="col-lg-12">
			@include('includes.footer')
		</footer>
	</div>
</body>
</html>