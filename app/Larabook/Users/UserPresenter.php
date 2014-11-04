<?php namespace Larabook\Users;

use Laracasts\Presenter\Presenter;

class UserPresenter extends Presenter{

	/**
	 * @desc Present a link to the user's gravatar
	 *
	 * @return string
	 */
	public function gravatar ($size = 30) {
		$email = md5($this->email);
		return "//www.gravatar.com/avatar/{$email}?s={$size}";
	}

	/**
	 * @desc Presents the count of followers
	 *
	 * @return type
	 */
	public function followersCount()
	{
		$count = $this->entity->followers()->count();

		$plural = str_plural('Follower', $count);

		return "{$count} {$plural}";
	}

	/**
	 * @desc Presents the count of followers
	 *
	 * @return type
	 */
	public function statusesCount()
	{
		$count = $this->entity->statuses()->count();

		$plural = str_plural('Status', $count);

		return "{$count} {$plural}";
	}
}
