<?php namespace Larabook\Users;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Larabook\Registration\Events\UserHasRegistered;
use Laracasts\Commander\Events\EventGenerator;
use Laracasts\Presenter\PresentableTrait;
// use Larabook\Users\FollowableTrait;
use Eloquent, Hash, Log;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, EventGenerator, PresentableTrait;
	use FollowableTrait;

	/**
	 * Path to the presenter for a usser
	 *
	 * @var string
	 */
	protected $presenter = 'Larabook\Users\UserPresenter';

	/**
	 * Wich fields may be mass assigned?
	 *
	 * @var array
	 */
	protected $fillable = ['username', 'email', 'password'];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	/**
	 * Passwords must always be hashed!
	 *
	 * @param $password
	 */
	public function setPasswordAttribute($password)
	{
		$this->attributes['password'] = Hash::make($password);
	}

	/**
	 * Get satatuses for current user
	 *
	 * @return mixed
	 */
	public function statuses()
	{
		return $this->hasMany('Larabook\Statuses\Status')->latest();
	}

	/**
	 * Register a new user
	 *
	 * @param $username
	 * @param $email
	 * @param $password
	 * @return static
	 **/
	public static function register($username, $email, $password)
	{
		$user = new static(compact('username', 'email', 'password'));

		$user->raise(new UserHasRegistered($user));

		return $user;
	}

	/**
	 * Determine if the given user is the same as the current one
	 *
	 * @param $user
	 * @return bool
	 */
	public function is($user)
	{
		if (is_null($user)) return false;

		return $this->username == $user->username;
	}

}
