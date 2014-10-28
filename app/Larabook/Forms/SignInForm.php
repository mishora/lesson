<?php namespace Larabook\Forms;

use Laracasts\Validation\FormValidator;

class SignInForm extends FormValidator
{

	/**
	 * @desc Validation rules for the registration form.
	 *
	 * @var array rules
	 */
	protected $rules = [
		'email' => 'required',
		'password' => 'required'
	];

}
