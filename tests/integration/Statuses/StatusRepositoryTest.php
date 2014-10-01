<?php

use Larabook\Statuses\StatusRepository;
use Laracasts\TestDummy\Factory as TestDummy;

class StatusRepositoryTest extends \Codeception\TestCase\Test
{
	/**
	* @var \IntegrationTester
	*/
	protected $tester;

	protected $repo;


	protected function _before()
	{
		$this->repo = new StatusRepository;
	}

	/** @test */
	public function it_gets_all_statuses_for_a_user()
	{
		// Given I Have two users
		$users = TestDummy::times(2)->create('Larabook\Users\User');
		// And statuses for both of them

		TestDummy::times(2)->create('Larabook\Statuses\Status', [
			'user_id' => $users[0]->id,
			'body' => 'My Status'
		]);

		TestDummy::times(2)->create('Larabook\Statuses\Status', [
			'user_id' => $users[1]->id,
			'body' => 'His Status'
		]);

		// When I fetch statuses for one users
		$statusesForUser[0] = $this->repo->getAllForUser($users[0]);
		$statusesForUser[1] = $this->repo->getAllForUser($users[1]);

		// Then I should receive only the relevant ones
		$this->assertCount(2, $statusesForUser[0]);
		$this->assertEquals('My Status', $statusesForUser[0][0]->body);
		$this->assertEquals('My Status', $statusesForUser[0][1]->body);
		$this->assertEquals('His Status', $statusesForUser[1][0]->body);
		$this->assertEquals('His Status', $statusesForUser[1][1]->body);
	}

	/** @test */
	public function it_saves_a_status_for_a_user()
	{
		// Given I Have an Unsaved status
		$status = TestDummy::build('Larabook\Statuses\Status', [
			'user_id' => null,
			'body' => 'My status'
		]);

		// And an existing user
		$user = TestDummy::create('Larabook\Users\User');

		// When I try to persist this status
		$savedStatus = $this->repo->save($status, $user->id);

		// Then it should be saved
		$this->tester->seeRecord('statuses', [
			'body' => 'My status'
		]);

		// And the status should have correct user_id
		$this->assertEquals($user->id, $savedStatus->user_id);
	}

}
