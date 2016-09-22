@extends('layouts/main')

@section('title', 'Create new Auction - Fruitbox')


@section('content')
	<div class="container">
		<h2>Create new Auction</h2>
		
		@include('partials/errors-alert')
		
		<form action="/auction" method="post" enctype="multipart/form-data">
			
			{{ csrf_field() }}
			
			<div class="form-group">
				<label for="title">Title</label>
				<input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}">
			</div>
			
			<div class="form-group">
				<label for="description">Description</label>
				<textarea name="description" id="description" cols="30" rows="5" class="form-control">{{ old('description') }}</textarea>
			</div>
			
			<div class="form-group">
				<label for="image">Image</label>
				<input type="file" id="image" name="image" class="form-control">
			</div>
			
			<div class="form-group">
				<label for="start_price">Starting Bid (NZD)</label>
				<div class="input-group">
					<span class="input-group-addon">$</span>
					<input type="number" id="start_price" name="start_price" class="form-control" value="{{ old('start_price', 1) }}">
				</div>
			</div>
			
			<div class="form-group">
				<label for="reserve">Reserve (NZD)</label>
				<div class="input-group">
					<span class="input-group-addon">$</span>
					<input type="number" id="reserve" name="reserve" class="form-control" value="{{ old('reserve', 1) }}">
				</div>
			</div>
			
			<div class="form-group">
				<input type="submit" value="Create" class="btn btn-primary">
			</div>
			
		</form>
	</div>
@endsection