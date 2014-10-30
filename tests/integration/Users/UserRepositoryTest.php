<?php

use Codeception\TestCase\Test;
use Larabook\Users\UserRepository;
use Laracasts\TestDummy\Factory as TestDummy;

class UserRepositoryTest extends Test
{
    /**
     * @var IntegrationTester
     */
    protected $tester;

	/**
	 *
	 * @var UserRepository
	 */
	private $repo;

	protected function _before()
    {
		$this->repo = new UserRepository;
    }

	/** @test */
	public function it_paginates_all_users()
	{
		$users = TestDummy::times(4)->create('Larabook\Users\User');

		$results = $this->repo->getPaginated(2);

		$this->assertCount(2, $results);
	}
}