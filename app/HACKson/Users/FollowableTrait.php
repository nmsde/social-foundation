<?php namespace HACKson\Users;


trait FollowableTrait {

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function followedUsers()
    {
        return $this->belongsToMany(static::class, 'follows', 'follower_id', 'followed_id')->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function followers()
    {
        return $this->belongsToMany(static::class, 'follows', 'followed_id', 'follower_id')->withTimestamps();
    }

    /**
     * @param User $otherUser
     * @return bool
     */
    public function isFollowedBy(User $otherUser)
    {
        $idsWhoOtherUserFollows = $otherUser->followedUsers()->lists('followed_id');

        return in_array($this->id, $idsWhoOtherUserFollows);
    }

} 