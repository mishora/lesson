<?php namespace Larabook\Core;

use App;

trait CommandBus {

	/**
	 * @desc Execute the command
	 *
	 * @param type $command
	 * @return type
	 */
	public function execute($command)
	{
		return $this->getCommandBus()->execute($command);
	}
	/**
	 * @desc Fetch the command bus
	 *
	 * @return mixed
	 */
	public function getCommandBus()
	{
		return App::make('Laracasts\Commander\CommandBus');
	}
}
