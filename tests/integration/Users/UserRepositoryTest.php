<?php
use HACKson\Users\UserRepository;
use Laracasts\TestDummy\Factory as TestDummy;

class UserRepositoryTest extends \Codeception\TestCase\Test
{
    /**
     * @var \IntegrationTester
     */
    protected $tester;

    protected $repo;

    protected function _before()
    {
        $this->repo = new UserRepository;
    }

    /** @test */
    public function it_paginates_all_users()
    {
        TestDummy::times(4)->create('HACKson\Users\User');

        $results = $this->repo->getPaginated(2);

        $this->assertCount(2, $results);
    }

    /** @test */
    public function it_finds_a_user_with_statuses_by_their_username()
    {
        //given
        $statuses = TestDummy::times(3)->create('HACKson\Statuses\Status');
        $username = $statuses[0]->user->username;

        //when
        $user = $this->repo->findByUsername($username);

        //then
        $this->assertEquals($username, $user->username);
        $this->assertCount(3, $user->statuses);
    }


    /** @test */
    public function it_finds_a_user_by_their_id()
    {
        //given
        $statuses = TestDummy::times(3)->create('HACKson\Statuses\Status');
        $userId = $statuses[0]->user->id;

        //when
        $user = $this->repo->findById($userId);

        //then
        $this->assertEquals($userId, $user->id);
    }


    /** @test */
    public function it_follows_another_user()
    {
        // given I have 2 users
        list($cat, $dog) = TestDummy::times(2)->create('HACKson\Users\User');

        // and one user follows another user
        $this->repo->follow($cat->id, $dog);

        // then I should see the user in the list of user 0 followings
        $this->assertTrue($dog->followedUsers->contains($cat->id));

    }

    /** @test */
    public function it_unfollows_another_user()
    {
        // given I have 2 users
        list($cat, $dog) = TestDummy::times(2)->create('HACKson\Users\User');

        // and one user follows another user
        $this->repo->follow($cat->id, $dog);

        // and one user unfollows another user
        $this->repo->unfollow($cat->id, $dog);

        // then I should see the user in the list of user 0 followings
        $this->assertFalse($dog->followedUsers->contains($cat->id));

    }
}