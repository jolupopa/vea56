<?php

namespace App\Http\Controllers\Admin;
use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller {
	public function index() {

		$products = Product::paginate(10);
		return view('admin.products.index')->with(compact('products')); // LIST
	}

	public function create() {
		$categories = Category::orderBy('name')->get();
		return view('admin.products.create')->with(compact('categories')); // formulario
	}

	public function store(Request $request) {

		$this->validate($request, Product::$rules, Product::$messages);

		// registrar
		//dd($request->all());
		$product = New Product();
		$product->name = $request->input('name');
		$product->description = $request->input('description');
		$product->price = $request->input('price');
		$product->long_description = $request->input('long_description');
		if ($request->category_id > 1) {
			$product->category_id = $request->category_id;
		}

		$product->save(); // CREATE

		return redirect('/admin/products');
	}

	public function edit($id) {
		$categories = Category::orderBy('name')->get();
		$product = Product::find($id);
		return view('admin.products.edit')->with(compact('product', 'categories')); // formulario
	}

	public function update(Request $request, $id) {
		$this->validate($request, Product::$rules, Product::$messages);

		$product = Product::find($id);
		$product->name = $request->input('name');
		$product->description = $request->input('description');
		$product->price = $request->input('price');
		$product->long_description = $request->input('long_description');
		if ($request->category_id > 1) {
			$product->category_id = $request->category_id;
		}
		$product->save(); //UPDATE

		return redirect('/admin/products');
	}

	public function destroy($id) {

		$product = Product::find($id);
		$product->delete(); // DELETE

		return back();
	}
}
