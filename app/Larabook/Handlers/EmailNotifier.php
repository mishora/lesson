<?php namespace Larabook\Handlers;

use Larabook\Mailers\UserMailer;
use Larabook\Registration\Events\UserRegistered;
use Laracasts\Commander\Events\EventListener;

class EmailNotifier extends EventListener
{

	/**
	 * @var UserMailer
	 */
	private $mailer;

	public function __construct(UserMailer $mailer)
	{
		$this->mailer = $mailer;
	}

	public function whenUserRegistered(UserRegistered $event)
	{
		$this->mailer->sendWelcomeMessageTo($event->user);
	}
}
