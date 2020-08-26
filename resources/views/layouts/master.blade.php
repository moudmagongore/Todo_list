<!DOCTYPE html>
<html>
<head>
	<title>todo liste</title>
	<meta charset="utf-8">
	

	<!-- bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">


	<!--  Fontawesomecdn bootstrap -->
   <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	
</head>
<body>

	
	<div class="container mt-4 col-sm-6 col-sm-offset-2">
		@if (session('success'))
			<div class="alert alert-success">
				{{session('success')}}
			</div>
		@elseif(session('danger'))
			<div class="alert alert-danger">
				{{session('danger')}}
			</div>		
		@endif

		@yield('content')
	</div>

	


	<!-- jquery -->
	<script
	  src="https://code.jquery.com/jquery-3.5.1.js"
	  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
	  crossorigin="anonymous"></script>

	
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>