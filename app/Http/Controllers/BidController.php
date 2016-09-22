<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Bid;
use App\Auction;
use Auth;

class BidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Create an empty bid model
        $bid = new Bid();
        
        // get the amount and auction_id from the form data
        $bid->amount = $request->amount;
        $bid->auction_id = $request->auction_id;
        
        // get the id of the currently logged in user
        $bid->user_id = Auth::user()->id;
        
        // load up the auction this bid is going to be for
        $auction = Auction::find($bid->auction_id);
        
        // order all of the auctions bids by date, and then just get the latest one
        $latest_bid = $auction->bids()->orderby('created_at', 'desc')->first();
        
        // if there isn't any bids already
        if(!$latest_bid) {
            // then make the minimum bid amount the auctions start price
            $minimum_bid = $auction->start_price;
            
        // if there IS a latest bid
        } else {
            // then make the minimum bid amount equal to that bid
            $minimum_bid = $latest_bid->amount;
        }
        
        // if the new bid is higher than the minimum
        if($minimum_bid < $bid->amount) {
            // save the bid
            $bid->save();
        }
        
        // bounce us back to the previous page
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}