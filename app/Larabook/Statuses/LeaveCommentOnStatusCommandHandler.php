<?php namespace Larabook\Statuses;

use Larabook\Statuses\StatusRepository;
use Laracasts\Commander\CommandHandler;

class LeaveCommentOnStatusCommandHandler implements CommandHandler {

	/**
	 * @var StatusRepository
	 */
	private $statusRepo;

	public function __construct(StatusRepository $statusRepo)
	{
		$this->statusRepo = $statusRepo;
	}

    /**
     * Handle the command.
     *
     * @param object $command
     * @return mixed
     */
    public function handle($command)
    {
		$comment = $this->statusRepo->leaveComment(
				$command->user_id, $command->status_id, $command->body
		);

		return $comment;
    }

}