<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

	public static $messages = [
		'name.required' => 'Es necesario ingresar el nombre para el producto.',
		'name.min' => 'El nombre del producto debe tener al menos 3 carateres.',
		'description.required' => 'La descripcion corta es obligatoria.',
		'description.max' => 'La descripcion solo admite hasta 200 caracteres.',
		'price.required' => 'Es obligatorio ingresar el precio del producto.',
		'price.numeric' => 'Ingrese un valor valido.',
		'price.min' => 'No se admiten valores negativos.',
	];
	public static $rules = [
		'name' => 'required|min:3',
		'description' => 'required|max:200',
		'price' => 'required|numeric|min:0',
	];

	// $product->category
	public function category() {
		return $this->belongsTo(Category::class);
	}

	// $product->images
	public function images() {
		return $this->hasMany(ProductImage::class);
	}

	public function getFeaturedImageUrlAttribute() {

		//$users = App\User::where('active', 1)->get();

		$featuredImage = $this->images()->where('featured', true)->first();

		if (!$featuredImage) {

			$featuredImage = $this->images->first();
			//dd($featuredImage);
		}

		if ($featuredImage) {
			//dd('mostramos imagen destacada');
			return $featuredImage->url;
		}

		// default
		return '/images/products/default.jpg';

	}

	public function getCategoryNameAttribute() {
		if ($this->category) {
			return $this->category->name;
		}

		return 'General';

	}

}
