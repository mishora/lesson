<?php namespace Larabook\Registration;

class RegisterUserCommand
{
	public $password;
	public $email;
	public $username;

	public function __construct($username, $email, $password)
	{
		$this->username = $username;
		$this->email = $email;
		$this->password = $password;
	}

}
