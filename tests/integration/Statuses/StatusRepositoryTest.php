<?php

use Codeception\TestCase\Test;
use Larabook\Statuses\StatusRepository;
use Laracasts\TestDummy\Factory as TestDummy;

class StatusRepositoryTest extends Test
{
    /**
     * @var IntegrationTester
     */
    protected $tester;

	/**
	 *
	 * @var StatusRepository
	 */
	private $repo;

	protected function _before()
    {
		$this->repo = new StatusRepository;
    }

    /** @test */
    public function it_get_all_statuses_for_a_user()
    {
		$users = TestDummy::times(2)->create('Larabook\Users\User');

		TestDummy::times(2)->create('Larabook\Statuses\Status', [
			'user_id' => $users[0]->id,
			'body' => 'My Status'
		]);
		TestDummy::times(2)->create('Larabook\Statuses\Status', [
			'user_id' => $users[1]->id,
			'body' => 'His Status'
		]);

		$statusesForUser = $this->repo->getAllForUser($users[0]);

		$this->assertCount(2, $statusesForUser);
		$this->assertEquals('My Status', $statusesForUser[0]->body);
		$this->assertEquals('My Status', $statusesForUser[1]->body);

    }

	/** @test */
	public function it_saves_a_status_for_a_user()
	{
		$status = TestDummy::create('Larabook\Statuses\Status', [
			'user_id' => null,
			'body' => 'My Status'
		]);

		$user = TestDummy::create('Larabook\Users\User');

		$savedStatus = $this->repo->save($status, $user->id);

		$this->tester->seeRecord('statuses', [
			'body' => 'My status'
		]);

		$this->assertEquals($user->id, $savedStatus->user_id);
	}
}