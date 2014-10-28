<?php namespace Larabook\Registration;

use Larabook\Users\User;
use Larabook\Users\UserRepository;
use Laracasts\Commander\CommandHandler;

class RegisterUserCommandHandler implements CommandHandler
{

	/**
	 * @var UserRepository
	 */
	private $repository;

	public function __construct(UserRepository $repository) {

		$this->repository = $repository;
	}

	/**
	 * @desc Handle the command
	 *
	 * @param $command
	 * @return mixed
	 */
	public function handle($command)
	{
		$user = User::register(
				$command->username,  $command->email, $command->password
		);

		$this->repository->save($user);

		return $user;
	}
}
