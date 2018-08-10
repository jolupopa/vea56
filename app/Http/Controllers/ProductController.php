<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller {
	public function index() {

		$products = Product::paginate(10);
		return view('admin.products.index')->with(compact('products')); // LIST
	}

	public function create() {
		return view('admin.products.create'); // formulario
	}

	public function store(Request $request) {
		// registrar
		// dd($request->all());
		$product = New Product();
		$product->name = $request->input('name');
		$product->description = $request->input('description');
		$product->price = $request->input('price');
		$product->long_description = $request->input('long_description');
		$product->save(); // CREATE

		return redirect('/admin/products');
	}

	public function edit($id) {

		$product = Product::find($id);
		return view('admin.products.edit')->with(compact('product')); // formulario
	}

	public function update(Request $request, $id) {

		$product = Product::find($id);
		$product->name = $request->input('name');
		$product->description = $request->input('description');
		$product->price = $request->input('price');
		$product->long_description = $request->input('long_description');
		$product->save(); //UPDATE

		return redirect('/admin/products');
	}

	public function destroy($id) {

		$product = Product::find($id);
		$product->delete(); // DELETE

		return back();
	}
}
