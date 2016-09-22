<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Auction extends Model
{
	use SoftDeletes;
	
	protected $fillable = ['title', 'description', 'start_price', 'reserve'];

	public function user() {
		return $this->belongsTo('App\User');
	}
	
	public function bids() {
		return $this->hasMany('App\Bid');
	}
}
