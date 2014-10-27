<?php

use Larabook\Forms\RegistrationForm;

class RegistrationController extends BaseController {

	/**
	 * var RegistrationFotm
	 */
	private $registrationForm;

	function __construct(RegistrationForm $registrationForm) {
		$this->registrationForm = $registrationForm;
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
		$user = User::create(
			Input::only('username', 'email', 'password')
		);

		Auth::login($user);

		return Redirect::home();
	}
}
