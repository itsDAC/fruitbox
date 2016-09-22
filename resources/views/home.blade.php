@extends('layouts/main')

@section('content')

	<div class="container">
		
		<div class="auction-container">
			
			@forelse($auctions as $auction)
				
				<div class="auction">
					<h3>{{ $auction->title }}</h3>
					
					<img src="/assets/uploads/{{ $auction->image }}" alt="">
					
					<a href="/auction/{{ $auction->id }}">View Auction</a>
				</div>
				
			@empty
				<div class="alert alert-info">
					There are no current auctions
				</div>
			@endforelse
			
		</div>
	</div>

@endsection