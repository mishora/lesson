<?php namespace Larabook\Statuses;

use Laracasts\Presenter\Presenter;

class StatusPresenter extends Presenter
{
	/**
	 * @desc Display how long it has been since the publish date.
	 *
	 * @return mixed
	 */
	public function timeSincePublished() {
		return $this->created_at->diffForHumans();
	}
}
