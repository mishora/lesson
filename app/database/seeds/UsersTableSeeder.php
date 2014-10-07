<?php

use Faker\Factory as Faker;
use Larabook\Users\User;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		// Create default User
		User::create([
				'username' => 'mishora',
				'email' => 'mishoria@gmail.com',
				'password' => '123456'
		]);

		// Create Random Users
		foreach(range(2, 50) as $index)
		{
			User::create([
				'username' => $faker->word . $index,
				'email' => $faker->email,
				'password' => 'secret'
			]);
		}
	}

}

