<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Auction;

class TestController extends Controller
{
	public function index() {
		$auctions = Auction::all();
		
		return view('home')->with(compact('auctions'));
	}
}
