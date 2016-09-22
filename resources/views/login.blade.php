@extends('layouts/main')

@section('title', 'Login')


@section('content')

	<div class="container">
		<h2>Login</h2>
		
		@include('partials/errors-alert')
		
		<form action="/login" method="post">
		
			{{ csrf_field() }}
			
			<div class="form-group">
				<label for="email">Email</label>
				<input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}">
			</div>
			
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" id="password" name="password" class="form-control">
			</div>
			
			<div class="form-group">
				<input type="submit" value="Login" class="btn btn-primary">
			</div>
			
		</form>
	</div>

@endsection