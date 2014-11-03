<?php namespace Larabook\Users;

use Laracasts\Commander\CommandHandler;

class FollowUserCommandHandler implements CommandHandler
{

	/**
	 * @var UserRepository
	 */
	private $userRepo;

	public function __construct(UserRepository $userRepo)
	{
		$this->userRepo = $userRepo;
	}

	/**
	 * Handle the command
	 *
	 * @param mixed $command
	 * @return mixed
	 */
	public function handle($command)
	{
		$user = $this->userRepo->findById($command->userId);

		$this->userRepo->follow($command->userIdToFollow, $user);

		return $user;
	}

}
