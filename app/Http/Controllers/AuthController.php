<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;

class AuthController extends Controller
{
	// Display the login form
	public function login() {
		return view('login');
	}
	
	// Try to log in using the form input
	public function attempt(Request $request) {
		$success = Auth::attempt($request->only('email', 'password'));
		
		// if our login failed for some reason
		if(!$success) {
			// create a messagebag
			$errorMessages = new \Illuminate\Support\MessageBag;
			
			// put our error into the messagebag
			$errorMessages->add('error', 'Your email and/or password was incorrect');
			
			// redirect to the homepage and send along the errors
			return redirect('/login')
				->withErrors($errorMessages)
				->withInput();
		}
		
		return redirect('/');
	}
	
	// log the user out
	public function logout() {
		Auth::logout();
		
		return redirect('/login');
	}
}