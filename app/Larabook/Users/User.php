<?php namespace Larabook\Users;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Larabook\Registration\Events\UserRegistered;
use Laracasts\Commander\Events\EventGenerator;
use Laracasts\Presenter\PresentableTrait;
use Eloquent, Hash, Log;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, EventGenerator, PresentableTrait;

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
		return $this->hasMany('Larabook\Statuses\Status');
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

		$user->raise(new UserRegistered($user));

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
		if (is_null($user)) return flase;

		return $this->username == $user->username;
	}

	/**
	 * Make a follow user relationship
	 *
	 */
	public function follows()
	{
		return $this->belongsToMany(self::class,
				 'follows', 'follower_id', 'followed_id')->withTimestamps();
	}


	/**
	 * Determine if current user follows another user.
	 *
	 * @param User $otherUser
	 * @return bool
	 */
	public function isFollowedBy(User $otherUser)
	{
		$idsWhoOtherUserFollows = $otherUser->follows()->lists('followed_id');

		return in_array($this->id, $idsWhoOtherUserFollows);
	}

}
