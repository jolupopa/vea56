<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		/*factory(App\Category::class, 5)->create();
			factory(App\Product::class, 100)->create();
		*/

		$categories = factory(App\Category::class, 5)->create();
		$categories->each(function ($category) {
			$products = factory(App\Product::class, 15)->make();
			$category->products()->saveMany($products);

			$products->each(function ($p) {
				$images = factory(App\ProductImage::class, 5)->make();
				$p->images()->saveMany($images);
			});
		});

		/* Documentacion ojo para coleccion usar saveMany
			$users = factory(App\User::class, 3)
			->create()
			->each(function ($u) {
				$u->posts()->save(factory(App\Post::class)->make());
		*/

	}
}
