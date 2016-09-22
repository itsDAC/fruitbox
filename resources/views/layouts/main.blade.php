<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title', 'FruitBox')</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.min.css">
	<link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>

	<header>
		<div class="container">
			<h1>FruitBox</h1>
			
			<nav>
				<ul>
					@if(Auth::guest())
						<li><a href="/login">Login</a></li>
						<li><a href="/user/create">Register</a></li>
					@else
						<li><a href="/auction/create">List Auction</a></li>
						<li><a href="/logout">Logout</a></li>
					@endif
				</ul>
			</nav>
		</div>
	</header>
	
	@yield('content')
	
</body>
</html>