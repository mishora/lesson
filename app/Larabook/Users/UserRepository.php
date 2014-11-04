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
		return User::orderBy('username', 'asc')->simplePaginate($howMany);
	}

	/**
	 * @desc Fetch a user by their username.
	 *
	 * @param string $username
	 * @return mixed
	 */
	public function findByUsername($username)
	{
		return User::with('statuses')->whereUsername($username)->first();
	}

	/**
	 * Find a user by their id.
	 *
	 * @param integer $id
	 * @return mixed
	 */
	public function findById($id) {
		return User::findOrFail($id);
	}

	/**
	 * Follow a Larabook user
	 *
	 * @param integer $userIdToFollow
	 * @param User $user
	 * @return mixed
	 */
	public function follow($userIdToFollow, User $user)
	{
		return $user->followedUsers()->attach($userIdToFollow);
	}

	/**
	 * @desc Unfollow a Larabook user
	 *
	 * @param type $userIdToUnfollow
	 * @param User $user
	 * @return type
	 */
	public function unfollow($userIdToUnfollow, User $user)
	{
		return $user->followedUsers()->detach($userIdToUnfollow);
	}

}
