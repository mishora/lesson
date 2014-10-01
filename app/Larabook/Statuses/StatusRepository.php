<?php namespace Larabook\Statuses;

use Larabook\Users\User;
use Log;

class StatusRepository
{
	public function getAllForUser(User $user)
	{
		return $user->statuses()->get();
	}

	/**
	 * Save a new status for a user

	 * @param Status $status
	 * @param integer $userId
	 * @return mixed
	 */
	public function save(Status $status, $userId)
	{
		return User::findOrFail($userId)->statuses()->save($status);
	}
}
