<?php namespace Larabook\Mailers;

use Illuminate\Mail\Mailer as Mail;

abstract class Mailer
{

	/**
	 * @var Mail
	 */
	private $mail;

	public function __construct(Mail $mail )
	{
		$this->mail = $mail;
	}

	/**
	 *
	 * @param User $user
	 * @param string $subject
	 * @param response $view
	 * @param mixed $data
	 */
	public function sendTo($user, $subject, $view, $data = [])
	{
		$this->mail->queue($view, $data, function($message) use($user, $subject)
		{
			$message->to($user->email)->subject($subject);
		});
	}
}
