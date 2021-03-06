<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	<link rel="stylesheet" href="/css/style.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300' rel='stylesheet' type='text/css'>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,300,700' rel='stylesheet' type='text/css'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

	<script>

		$(document).ready(function(){
    		$(".fa.fa-chevron-down").click(function(){
       			$('.collapsed-nav').slideToggle();
    		});
		});

		$(document).ready(function(){
    		$(".sign-in-link").click(function(){
       			$('.user-nav').fadeToggle(100);
    		});
		});

	</script>



</head>
<body>

	@include('layout.partials.header')

	@yield('content')

</body>
</html>