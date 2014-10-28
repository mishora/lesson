<!doctype html>
<html>
<head>
	<meta charset=UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/main.css">
</head>
<body>

	@include('layouts.partials.nav')

	<div class="container">
		@include('flash::message')
		@yield('content')
	</div>
	<script type="text/javascript" src='//code.jquery.com/jquery.js'></script>
	<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<script type="text/javascript">$('#flash-overlay-modal').modal();</script>
</body>
</html>
