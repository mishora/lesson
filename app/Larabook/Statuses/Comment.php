<?php namespace Larabook\Statuses;

class Comment extends \Eloquent {

	protected $fillable = ['user_id', 'status_id', 'body'];

	/**
	 * @return mixed
	 *
	 */
	public function owner()
	{
		return $this->belongsTo('Larabook\Users\User', 'user_id');
	}

	/**
	 *
	 * @param int $userId
	 * @param int $StatusId
	 */
	public static function leave($body, $statusId)
	{
		return new static([
			'body' => $body,
			'status_id' => $statusId
		]);
	}
}
