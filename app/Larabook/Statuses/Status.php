<?php namespace Larabook\Statuses;

use Eloquent;
use Larabook\Statuses\Events\StatusWasPublished;
use Laracasts\Commander\Events\EventGenerator;
use Laracasts\Presenter\PresentableTrait;

class Status extends Eloquent
{
	use EventGenerator, PresentableTrait;

	/**
	 * @desc Fillable fields for a new status
	 * @var array
	 */
	protected $fillable = ['body'];

	protected $presenter = 'Larabook\Statuses\StatusPresenter';

	/**
	 * @desc A Status belongs to a user.
	 *
	 * @return mixed
	 */
	public function user() {
		return $this->belongsTo('Larabook\Users\User');
	}

	/**
	 * @desc Publish a new Status
	 *
	 * @param type $body
	 * @return static
	 */
	public static function publish($body)
	{
		$status = new static(compact('body'));

		$status->raise(new StatusWasPublished($body));

		return $status;
	}

	/**
	 *
	 * @return mixed
	 */
	public function comments()
	{
		return $this->hasMany('Larabook\Statuses\Comment');
	}
}
