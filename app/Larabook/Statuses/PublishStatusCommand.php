<?php namespace Larabook\Statuses;

class PublishStatusCommand
{
	/**
	 * @var integer
	 */
	public $userId;

	/**
	 * @var string
	 */
	public $body;

	public function __construct($body, $userId)
	{
		$this->body = $body;
		$this->userId = $userId;
	}
}
