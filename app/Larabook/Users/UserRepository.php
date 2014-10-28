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
}
