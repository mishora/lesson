<?php

use Larabook\Users\FollowUserCommand;
use Larabook\Users\UnfollowUserCommand;

class FollowsController extends \BaseController {

	/**
	 * Follow a user
	 *
	 * @return Response
	 */
	public function store()
	{
		// ID of the user to follow
		// ID of the authenticated user
		$input = array_add(Input::get(), 'userId', Auth::id());

		$this->execute(FollowUserCommand::class, $input);

		Flash::success('You are now following this user.');

		return Redirect::back();
	}

	/**
	 * Unfollow a user.
	 *
	 * @param  int  $userIdToUnfollow
	 * @return Response
	 */
	public function destroy($userIdToUnfollow)
	{
		$input = array_add(Input::get(), 'userId', Auth::id());

		$this->execute(UnfollowUserCommand::class, $input);

		Flash::success('You have now unfollowes this user.');

		return Redirect::back();
	}

}
