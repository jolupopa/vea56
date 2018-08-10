<?php

use Faker\Generator as Faker;

$factory->define(App\ProductImage::class, function (Faker $faker) {
	return [
		'image' => 'https://placeimg.com/250/250/arch',
		'product_id' => $faker->numberBetween(1, 100),
	];
});
