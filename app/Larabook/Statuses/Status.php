<?php namespace Larabook\Statuses;

use Eloquent;
use Larabook\Statuses\Events\StatusWasPublished;
use Laracasts\Commander\Events\EventGenerator;
use Laracasts\Presenter\PresentableTrait;

class Status extends Eloquent
{
	use EventGenerator, PresentableTrait;

	/**
	 * Path to the presenter for a status
	 *
	 * @var string
	 */
	protected $presenter = 'Larabook\Statuses\StatusPresenter';

	/**
	 * Fillable fields for Statuses
	 *
	 * @var array
	 */
	protected $fillable = ['body'];
	// protected $table = 'statuses';

	/**
	 * A status belongs to a user.
	 *
	 * @return mixed
	 */
	public function user()
	{
		return $this->belongsTo('Larabook\Users\User');
	}

	/**
	 * Publish a new status
	 *
	 * @param $body
	 * @return static
	 */
	public static function publish($body)
	{
		$status = new static(compact('body'));

		$status->raise(new StatusWasPublished($body));

		return $status;
	}

	/**
	 * @return mixed
	 *
	 **/
	public function comments()
	{
		return $this->hasMany('Larabook\Statuses\Comment');
	}
}
