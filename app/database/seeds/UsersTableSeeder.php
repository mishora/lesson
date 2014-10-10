<?php

use Faker\Factory as Faker;
use Larabook\Users\User;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		// Create Random Users
		foreach(range(1, 50) as $index)
		{
			User::create([
				'username' => $faker->word . $index,
				'email' => $faker->email,
				'password' => 'secret'
			]);
		}
	}

}

