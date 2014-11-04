<?php

use Faker\Factory as Faker;
use Larabook\Statuses\Status;
use Larabook\Users\User;

class StatusesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		$userIds = User::lists('id');

		foreach(range(1, 1000) as $index)
		{
			Status::create([
				'user_id' => $faker->randomElement($userIds),
				'body' => $this->generateStatusBody($faker, rand(1,13)),
				'created_at' => $faker->dateTime()
			]);
		}
	}

	/**
	 * @desc Generate statuses with random count of sentences
	 *
	 * @param Faker $faker
	 * @param int $cnt
	 *
	 * @return string
	 */
	public function generateStatusBody($faker, $cnt)
	{
		$ret = '';
		for ($i = 1; $i <= $cnt; $i++) {
			$ret .= $faker->sentence();
		}
		return $ret;
	}

}