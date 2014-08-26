<?php namespace HACKson\Users;

use Laracasts\Presenter\Presenter;

class UserPresenter extends Presenter {

    public function gravatar($size = 30){
        $emailHash = md5($this->email);

        return "//www.gravatar.com/avatar/{$emailHash}?s={$size}";
    }

    public function followingCount()
    {
        return $this->entity->followedUsers()->count();
    }

    public function followersCount()
    {
        return $this->entity->followers()->count();
    }

    public function statusCount()
    {
        return $this->entity->statuses()->count();
    }
}