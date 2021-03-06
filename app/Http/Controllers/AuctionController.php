<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Auction;
use Auth;

class AuctionController extends Controller
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
        return view('auction_form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'       => 'required',
            'description' => 'required',
            'start_price' => 'required',
            'reserve'     => 'required',
        ]);
        
        // Create a new blank auction model
        $auction = new Auction();
        
        // Dump everything from the form input into the model
        // Depends on what is allowed by your $fillable array in the model
        $auction->fill($request->all());
        
        $auction->user_id = Auth::user()->id;
        
        // if we uploaded a image
        if ($request->hasFile('image')) {
            // Get the name of the uploaded file
            $filename = $request->file('image')->getClientOriginalName();
            
            // Move the uploaded file into our uploads folder
            $request->file('image')->move('assets/uploads/', $filename);
            
            // put the filename of the image into the model
            $auction->image = $filename;
        }
        
        // Save the auction
        $auction->save();
        
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $auction = Auction::find($id);
        
        // dd($auction->bids);
        
        return view('single_auction')->with(compact('auction'));
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