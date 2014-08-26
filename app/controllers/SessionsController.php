<?php

use HACKson\Forms\SignInForm;

class SessionsController extends \BaseController {


    /**
     * @var HACKson\Forms\SignInForm
     */
    private $signInForm;

    function __construct(SignInForm $signInForm)
    {
        $this->beforeFilter('guest', ['except' => 'destroy']);
        $this->signInForm = $signInForm;
    }


    /**
	 * Show the form for creating a new resource.
	 * GET /sessions/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('sessions.create');
	}

    /**
	 * Store a newly created resource in storage.
	 * POST /sessions
	 *
	 * @return Response
	 */
	public function store()
	{
        $formData = Input::only('email', 'password');

        $this->signInForm->validate($formData);

        if (! Auth::attempt($formData))
        {
            Flash::error('Felaktiga uppgifter!');
            return Redirect::back()->withInput();
        }

        Flash::message('Välkommen tillbaka!');

        return Redirect::intended('/statuses');

	}

    public function destroy()
    {
        Auth::logout();

        Flash::message('Du har nu loggats ut.');

        return Redirect::home();
    }

}