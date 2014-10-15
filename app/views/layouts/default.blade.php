<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document Title</title>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/css/main.css">
</head>
<body>

@include('layouts.partials.nav')

	<div class="container">
	@include('flash::message')
		@yield('content')
	</div>

	<script type="text/javascript" src="//code.jquery.com/jquery.js"></script>
	<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$('#flash-overlay-modal').modal();
		$('.comments__create-form').on('keydown', function(e){
			if (e.keyCode == 13) {
				e.preventDefault();
				$(this).submit();
			}
		});
	</script>
</body>
</html>
