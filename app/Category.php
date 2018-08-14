<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {
	//$category->products
	public static $messages = [
		'name.required' => 'Es necesario ingresar el nombre para la categoria.',
		'name.min' => 'El nombre de la categoria debe tener al menos 3 carateres.',
		'description.max' => 'La descripcion solo admite hasta 200 caracteres.',

	];
	public static $rules = [
		'name' => 'required|min:3',
		'description' => 'max:200',

	];
	protected $fillable = ['name', 'description'];

	public function products() {

		return $this->hasMany(Product::class);

	}

	public function getFeaturedImageUrlAtribute() {

		$featuredProduct = $this->products->images()->first();

		return $featuredProduct->featured_image_url;

	}
}
