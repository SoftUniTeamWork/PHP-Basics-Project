<!DOCTYPE html>
<html>
<head>
	@include('includes.head')
</head>
<body>
	<header class="center">
		@include('includes.header')
	</header>
	<main class="center">
		@yield('content')
	</main>
	<footer class="center">
		@include('includes.footer')
	</footer>
</body>
</html>