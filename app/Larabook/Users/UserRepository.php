<?php namespace Larabook\Users;

use Larabook\Users\User;

class UserRepository
{
	/**
	 * @desc Persist a user
	 *
	 * @param User $user
	 * @return mixed
	 */
	public function save(User $user) {
		return $user->save();
	}

	/**
	 * @desc Get a paginated list of all users.
	 *
	 * @param int $howMany
	 * @return mixed
	 */
	public function getPaginated($howMany = 25)
	{
		return User::simplePaginate($howMany);
	}
}
