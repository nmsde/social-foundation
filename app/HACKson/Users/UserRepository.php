<?php namespace HACKson\Users;


/**
 * Class UserRepository
 * @package HACKson\Users
 */
class UserRepository {

    /**
     * @param User $user
     * @return mixed
     */
    public function save(User $user)
    {
        return $user->save();
    }

    /**
     * @param int $howMany
     * @return \Illuminate\Pagination\Paginator
     */
    public function getPaginated($howMany = 25)
    {
        return User::orderBy('username', 'asc')->paginate($howMany);
    }

    /**
     * @param $username
     * @return mixed
     */
    public function findByUsername($username)
    {
        return User::with('statuses')->whereUsername($username)->first();
    }

    /**
     * @param $id
     * @return \Illuminate\Support\Collection|static
     */
    public function findById($id)
    {
        return User::findOrFail($id);
    }

    /**
     * @param $userIdToFollow
     * @param User $user
     */
    public function follow($userIdToFollow, User $user)
    {
        return $user->followedUsers()->attach($userIdToFollow);
    }

    /**
     * @param $userIdToUnfollow
     * @param User $user
     * @return int
     */
    public function unfollow($userIdToUnfollow, User $user)
    {
        return $user->followedUsers()->detach($userIdToUnfollow);
    }

}