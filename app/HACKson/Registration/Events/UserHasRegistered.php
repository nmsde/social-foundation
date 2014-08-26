<?php namespace HACKson\Registration\Events;

use HACKson\Users\User;

class UserHasRegistered {


    /**
     * @var
     */
    public $user;

    function __construct(User $user)
    {
        $this->user = $user;
    }
}