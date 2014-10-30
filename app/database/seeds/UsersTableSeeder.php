<?php

// Composer: "fzaninotto/faker": "v1.3.0"


use Faker\Factory as Faker;
use Larabook\Users\User;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 50) as $index)
		{
			if ($index == 1) {
				$username = 'mishoria';
				$email = 'mishoria@gmail.com';
			} else {
				$username = $faker->userName;
				$email = $faker->email;
			}

			User::create([
				'username' => $username,
				'email' => $email,
				'password' => '123456'
			]);
		}
	}

}