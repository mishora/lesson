<?php

use Larabook\Users\UserRepository;
use Laracasts\TestDummy\Factory as TestDummy;

class UserRepositoryTest extends \Codeception\TestCase\Test
{
	/**
	* @var \IntegrationTester
	*/
	protected $tester;

	/**
	* @var UserRepository
	*/
	protected $repo;


	protected function _before()
	{
		$this->repo = new UserRepository;
	}

	/** @test */
	public function it_paginates_all_users()
	{
		TestDummy::times(4)->create('Larabook\Users\User');

		$results = $this->repo->getPaginated(2);

		$this->assertCount(2, $results->getCollection());
	}

	/** @test */
	public function it_finds_a_user_with_statuses_by_their_username()
	{
		$statuses = TestDummy::times(3)->create('Larabook\Statuses\Status');

		$username = $statuses[0]->user->username;

		$user = $this->repo->findByUsername($username);

		$this->assertEquals($username, $user->username);
		$this->assertCount(3, $user->statuses);

	}

	/** @test */
	public function it_follows_another_user()
	{
		list($John, $Susan) = TestDummy::times(2)->create('Larabook\Users\User');

		$this->repo->follow($Susan->id, $John);

		$this->assertCount(1, $John->followedUsers);
		$this->tester->assertTrue($John->followedUsers->contains($Susan->id));
		$this->tester->canSeeRecord('follows', [
			'follower_id' => $John->id,
			'followed_id' => $Susan->id
		]);
	}

	/** @test */
	public function it_unfollows_another_user()
	{
		list($John, $Susan) = TestDummy::times(2)->create('Larabook\Users\User');

		$this->repo->follow($Susan->id, $John);

		$this->repo->unfollow($Susan->id, $John);

		$this->assertCount(0, $John->followedUsers);

		$this->tester->dontSeeRecord('follows', [
			'follower_id' => $John->id,
			'followed_id' => $Susan->id
		]);
	}

}
