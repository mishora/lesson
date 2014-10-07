<?php namespace Larabook\Users;

class FollowUserCommand
{
	public $userId;

	public $userIdToFollow;

	/**
	 * undocumented function
	 *
	 * @return void
	 **/
	function __construct($userId, $userIdToFollow)
	{
		$this->userId = $userId;
		$this->userIdToFollow = $userIdToFollow;
	}

}
