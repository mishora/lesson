<?php namespace Larabook\Users;

use Laracasts\Commander\CommandHandler;
use Larabook\Users\UserRepository;

class FollowUserCommandHandler implements CommandHandler
{
	protected $userRepo;

	/**
	 * Constructor
	 *
	 * @param UserReepository
	 */
	 function __construct(UserRepository $userRepo)
	 {
	 	$this->userRepo = $userRepo;
	 }

	/**
	 * Handle the command
	 *
	 * @param $command
	 * @return mixed
	 */
	function handle($command)
	{
		$user = $this->userRepo->findById($command->userId);

		$this->userRepo->follow($command->userIdToFollow, $user);

		return $user;
	}
}
