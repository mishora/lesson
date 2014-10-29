<?php namespace Larabook\Statuses\Events;

class StatusWasPublished
{
	/**
	 *
	 * @var string
	 */
	public $body;

	public function __construct($body)
	{
		$this->body = $body;
	}
}
