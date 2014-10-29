<?php namespace Larabook\Forms;

use Laracasts\Validation\FormValidator;

class PublishStatusForm extends FormValidator
{
	/**
	 *
	 * @var array
	 */
	protected $rules = [
		'body' => 'required'
	];
}
