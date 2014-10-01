<?php namespace Larabook\Statuses;

use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;
use Larabook\Statuses\StatusRepository;
use Log;

class PublishStatusCommandHandler implements CommandHandler
{
	use DispatchableTrait;
	/**
	 * @var StatusRepository
	 */
	protected $statusRepository;

	/**
	 * @param StatusRepository $statusRepository
	 */
	function __construct(StatusRepository $statusRepository)
	{
		$this->statusRepository = $statusRepository;
	}

	/**
	 * Handle the command
	 *
	 * @return $command
	 * @return mixed
	 */
	public function handle($command)
	{
		$status = Status::publish($command->body);

		$status = $this->statusRepository->save($status, $command->userId);

		$status = $this->dispatchEventsFor($status);

		return $status;
	}

}
