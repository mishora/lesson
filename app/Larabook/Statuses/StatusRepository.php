<?php namespace Larabook\Statuses;

use Larabook\Statuses\Status;
use Larabook\Users\User;

class StatusRepository
{
	public function getAllForUser(User $user)
	{
		return $user->statuses;
	}

	/**
	 * @desc Save a new status for a User
	 *
	 * @param Status $status
	 * @param integer $userId
	 * @return mixed
	 */
	public function save(Status $status, $userId)
	{
		return User::findOrFail($userId)
					->statuses()
					->save($status);
	}

}
