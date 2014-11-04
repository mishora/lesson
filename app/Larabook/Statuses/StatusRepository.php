<?php namespace Larabook\Statuses;

use Larabook\Statuses\Status;
use Larabook\Users\User;

class StatusRepository
{
	public function getAllForUser(User $user)
	{
		return $user->statuses()->with('user')->latest()->get();
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

	/**
	 * @desc Get the feed for a User.
	 *
	 * @param User $user
	 * @return type
	 */
	public function getFeedForUser(User $user)
	{
		$userIds = $user->followedUsers()->lists('followed_id');

		$userIds[] = $user->id;

		return Status::whereIn('user_id', $userIds)->latest()->get();
	}

}
