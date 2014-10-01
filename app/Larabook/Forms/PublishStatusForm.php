<?php namespace Larabook\Forms;

use Laracasts\Validation\FormValidator;

class PublishStatusForm extends FormValidator
{
	/**
	 * Validation for the publish status form.
	 *
	 * @var array
	 **/
	var $rules = [
		'body' => 'required'
	];
}
