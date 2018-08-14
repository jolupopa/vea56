<?php

namespace App\Http\Controllers;
use App\Category;

class WelcomeController extends Controller {
	public function index() {

		$categories = Category::has('products')->get();

		return view('welcome')->with(compact('categories'));
	}
}
