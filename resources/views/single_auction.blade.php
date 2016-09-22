@extends('layouts/main')

@section('title', 'View Auction - Fruitbox')


@section('content')
	
	<div class="container">
	
		<div class="auction-info">
			<div>
				<h2>{{ $auction->title }}</h2>
				
				<p>{{ $auction->description }}</p>
				
				<p><strong>Reserve:</strong> ${{ $auction->reserve }}</p>
			</div>
			<div>
				<img src="/assets/uploads/{{ $auction->image }}" alt="" class="auction-image">
			</div>
		</div>
		
		<div class="bids">
			<form action="/bid" method="post">
			
				{{ csrf_field() }}
				
				<input type="hidden" name="auction_id" value="{{ $auction->id }}">
				
				<div class="form-group">
					<div class="input-group">
						<span class="input-group-addon">$</span>
						<input type="number" name="amount" class="form-control" step="0.01">
						<span class="input-group-btn">
							<input type="submit" value="Bid" class="btn btn-primary">
						</span>
					</div>
				</div>
			</form>
			
			@forelse($auction->bids()->orderby('created_at', 'desc')->get() as $bid)
				
				<div class="bid">
					<span class="user">{{ $bid->user->name }}</span>
					<span class="amount">${{ $bid->amount }}</span>
				</div>
				
			@empty
				<p>There are no bids</p>
			@endforelse
		</div>
	</div>
	
@endsection