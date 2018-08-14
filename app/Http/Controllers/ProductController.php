<?php

namespace App\Http\Controllers;
use App\Product;
use App\ProductImage;

class ProductController extends Controller {
	public function show($id) {
		$product = Product::find($id);
		$images = ProductImage::where('product_id', $id)->get();
		return view('products.show')->with(compact('product', 'images'));

	}
}
