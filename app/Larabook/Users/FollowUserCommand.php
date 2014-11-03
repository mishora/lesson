<?php namespace Larabook\Users;

class FollowUserCommand
{
	/**
	 *
	 * @var integer
	 */
	public $userIdToFollow;

	/**
	 *
	 * @var integer
	 */
	public $userId;

	public function __construct($userId, $userIdToFollow)
	{
		$this->userId = $userId;
		$this->userIdToFollow = $userIdToFollow;
	}

}
