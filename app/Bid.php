<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
	protected $fillable = ['amount'];
	
	public function user() {
		return $this->belongsTo('App\User');
	}
	
	public function auction() {
		return $this->belongsTo('App\Auction');
	}
}