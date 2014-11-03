<?php

use Larabook\Forms\RegistrationForm;
use Larabook\Registration\RegisterUserCommand;
use Laracasts\Flash\Flash;

class RegistrationController extends BaseController
{

	/**
	 * var RegistrationFotm
	 */
	private $registrationForm;

	function __construct(RegistrationForm $registrationForm) {
		$this->registrationForm = $registrationForm;

		$this->beforeFilter('guest');
	}

	/**
	 * Show a form to register the user
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('registration.create');
	}

	public function store()
	{
		$this->registrationForm->validate(Input::all());

		$user = $this->execute(RegisterUserCommand::class);

		Auth::login($user);

		Flash::overlay('Glad to have you as a new GETIX member!');

		return Redirect::home();
	}
}
