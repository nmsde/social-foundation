<?php namespace HACKson\Users;

use HACKson\Registration\Events\UserHasRegistered;
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Eloquent;
use Hash;
use Laracasts\Commander\Events\EventGenerator;
use Laracasts\Presenter\PresentableTrait;

/**
 * Class User
 * @package HACKson\Users
 */
class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, EventGenerator, PresentableTrait, FollowableTrait;



	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

    /**
     * @var string
     */
    protected $presenter = 'HACKson\Users\UserPresenter';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

    /**
     * @param $password
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    /**
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function statuses()
    {

        return $this->hasMany('HACKson\Statuses\Status')->latest();
    }

    /**
     * @param $username
     * @param $email
     * @param $password
     * @return static
     */
    public static function register($username, $email, $password){

        $user = new static(compact('username', 'email', 'password'));

        $user->raise(new UserHasRegistered($user));

        return $user;
    }

    /**
     * @param User $user
     * @return bool
     */
    public function is(User $user = null)
    {
        if (is_null($user)) return false;

        return $this->username == $user->username;
    }



}