<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

	// $product->category
	public function category() {
		return $this->belongsTo(Category::class);
	}

	// $product->images
	public function images() {
		return $this->hasMany(ProductImage::class);
	}

	public function getFeaturedImageAttribute() {

		$featuredImage = $this->images()->where('featured', true)->first();

		if (!$featuredImage) {

			$featuredImage = $this->images()->first();
			//dd('primera imagen encontrada');
		}

		if ($featuredImage) {
			//dd('mostramos la destacada');
			return $featuredImage->url;
		}

		// default
		return '/images/products/default.jpg';

	}

}