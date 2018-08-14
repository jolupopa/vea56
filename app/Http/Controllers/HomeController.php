<?php

namespace App\Http\Controllers;

use App\Cart;

class HomeController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$cart = Cart::with('details')->find(auth()->user()->id);
		//dd($cart);
		return view('home')->with(compact('cart'));

	}
}
