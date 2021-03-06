<!DOCTYPE html>
<html>
<head>
	<title>{{ config('app.name') }} | @yield('title', 'Blog Application') </title>

	<link rel="stylesheet" type="text/css" href="{{ url('packages/bootstrap-4.3.1/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ url('css/custom.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ url('packages/fontawesome/css/all.css') }}">
</head>
<body>
	<div class="container">
		@include('messages')

		@yield('content')
	</div>

	<script type="text/javascript" src="{{ url('packages/bootstrap-4.3.1/js/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ url('packages/fontawesome/js/all.js') }}"></script>
	@yield('after_scripts')
</body>
</html>