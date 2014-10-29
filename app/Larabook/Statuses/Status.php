<?php namespace Larabook\Statuses;

use Eloquent;
use Larabook\Statuses\Events\StatusWasPublished;
use Laracasts\Commander\Events\EventGenerator;

class Status extends Eloquent
{
	use EventGenerator;
	/**
	 * @desc Fillable fields for a new status
	 * @var array
	 */
	protected $fillable = ['body'];

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

}
