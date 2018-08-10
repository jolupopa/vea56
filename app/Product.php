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

}
