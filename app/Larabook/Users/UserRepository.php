<?php namespace Larabook\Users;

use Larabook\Users\User;
use Log;

class UserRepository
{
	/**
	 * Persist a user
	 *
	 * @param User $user
	 * @return mixed
	 **/

	public function save(User $user)
	{
		return $user->save();
	}

	/**
	 * Get a paginated list of all resource
	 *
	 * @return Response
	 */
	public function getPaginated($howMany = 25)
	{
		return User::orderBy('username', 'asc')->simplePaginate($howMany);
	}

	/**
	 * Fetch a user by their Username
	 *
	 * @param User $username
	 * @return Response
	 */
	public function findByUsername($username)
	{
		return User::with(['statuses' => function($query) {
			$query->latest();
		}])->whereUsername($username)->first();
	}

	/**
	 * Find a user by their id.
	 *
	 * @param int $id
	 * @return mixed
	 */
	public function findById($id)
	{
		return User::findOrFail($id);
	}

	/**
	 * Follow a Larabook user.
	 *
	 * @param int $userIdToFollow
	 * @param User $user
	 *
	 */
	public function follow($userIdToFollow, User $user)
	{
		return $user->followedUsers()->attach($userIdToFollow);
	}

	/**
	 * Unfollow a Larabook user.
	 *
	 * @param int $userIdToUnollow
	 * @param User $user
	 *
	 */
	public function unfollow($userIdToUnfollow, User $user)
	{
		return $user->followedUsers()->detach($userIdToUnfollow);
	}

}
