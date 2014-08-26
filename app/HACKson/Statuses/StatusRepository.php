<?php namespace HACKson\Statuses;

use HACKson\Users\User;

class StatusRepository {


    private $perPage;

    function __construct($perPage = 5)
    {
        $this->perPage = $perPage;
    }

    public function getAllForUser(User $user){
        return $user->statuses()->with('user')->latest()->paginate($this->perPage);
    }


    public function getFeedForUser(User $user)
    {
        $userIds = $user->followedUsers()->lists('followed_id');
        $userIds[] = $user->id;

        return Status::whereIn('user_id', $userIds)->latest()->paginate($this->perPage);
    }


    public function save(Status $status, $userId)
    {

        return User::findOrFail($userId)
            ->statuses()
            ->save($status);

    }


}