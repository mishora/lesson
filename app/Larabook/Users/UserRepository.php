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
		return User::simplePaginate($howMany);
	}

}
