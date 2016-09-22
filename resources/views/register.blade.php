@extends('layouts/main')

@section('title', 'Register')


@section('content')
	<div class="container">
		<h2>Register Account</h2>
		
		@include('partials/errors-alert')
		
		<form action="/user" method="post">
		
			{{ csrf_field() }}
			
			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}">
			</div>
			
			<div class="form-group">
				<label for="email">Email</label>
				<input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}">
			</div>
			
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" id="password" name="password" class="form-control">
			</div>
			
			<div class="form-group">
				<input type="submit" value="Register" class="btn btn-primary">
			</div>
			
		</form>
	</div>
@endsection