<?php

use HACKson\Users\FollowUserCommand;
use HACKson\Users\UnfollowUserCommand;

/**
 * Class FollowersController
 */
class FollowersController extends \BaseController {


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// id of the user to follow

        // id of the auth user
        $input = array_add(Input::get(), 'userId', Auth::id());

        $this->execute(FollowUserCommand::class, $input);

        Flash::success('Du följer nu denna användaren!');

        return Redirect::back();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 */
	public function destroy($userIdToUnfollow)
	{
        $input = array_add(Input::get(), 'userId', Auth::id());

        $this->execute(UnfollowUserCommand::class, $input);

        Flash::success('Du har nu avföljt användaren.');

        return Redirect::back();
	}


}
