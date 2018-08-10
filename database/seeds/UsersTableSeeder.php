<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		User::Create([
			'name' => 'jolupp',
			'email' => 'jlportilla76@gmail.com',
			'password' => bcrypt('123456'),
			'admin' => true,
			'remember_token' => str_random(10),
		]);
	}
}
