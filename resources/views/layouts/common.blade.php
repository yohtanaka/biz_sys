<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>@yield('title')</title>

	<!-- Scripts -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="{{ asset('js/main.js') }}" defer></script>
	<script src="/js/report.js" defer></script>

	<!-- Fonts -->
	<link rel="dns-prefetch" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

	<!-- Styles -->
	<link href="{{ asset('css/style.css') }}" rel="stylesheet">
	<link href="{{ asset('css/normalize.css') }}" rel="stylesheet">
</head>
<body>
	<header class="clearfix">
	@include('layouts._header')
	</header>
	<div class="container">
		@yield('content')
	</div>
	<footer>
	@include('layouts._footer')
	</footer>
</body>
</html>
