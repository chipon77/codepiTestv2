<!doctype html>
<html lang="fr">
	<head>
	    <meta charset="UTF-8">
	    <title>@yield('title')</title>
	      <!-- Bootstrap  -->
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>		
		<link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
		<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>		
	</head>	
	<body>
		@include('navbar')
		@if ($errors->any())
    		<div class="alert alert-danger">
        		<ul>
            		@foreach ($errors->all() as $error)
                		<li>{{ $error }}</li>
            		@endforeach
        		</ul>
    		</div>
		@endif
		@yield('content')
	</body>
</html>