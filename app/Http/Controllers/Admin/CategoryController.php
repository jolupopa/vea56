<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller {
	public function index() {

		$categories = Category::orderBy('name')->paginate(10);
		return view('admin.categories.index')->with(compact('categories')); // LIST
	}

	public function create() {
		return view('admin.categories.create'); // formulario
	}

	public function store(Request $request) {

		$this->validate($request, Category::$rules, category::$messages);

		// registrar en BD

		Category::create($request->all());

		return redirect('/admin/categories');
	}

	public function edit(Category $category) {

		return view('admin.categories.edit')->with(compact('category')); // formulario
	}

	public function update(Request $request, Category $category) {
		// validar

		$this->validate($request, Category::$rules, Category::$messages);

		$category->update($request->all());

		return redirect('/admin/categories');
	}

	public function destroy(Category $category) {

		$category->delete(); // DELETE

		return back();
	}
}
