<?php

use HACKson\Forms\RegistrationForm;
use HACKson\Registration\RegisterUserCommand;
/**
 * Class RegistrationController
 */
class RegistrationController extends \BaseController {

    /**
     * @var hackson\Forms\RegistrationForm
     */
    private $registrationForm;

    /**
     * @param RegistrationForm $registrationForm
     */
    public function __construct(RegistrationForm $registrationForm){
        $this->registrationForm = $registrationForm;

        $this->beforeFilter('guest');
    }


    /**
     * @return mixed
     */
    public function create()
	{
		return View::make('registration.create');
	}


    /**
     * @return mixed
     */
    public function store()
    {

        $this->registrationForm->validate(Input::all());

        $user = $this->execute(RegisterUserCommand::class);

        Auth::login($user);

        Flash::overlay(Lang::get('default.Welcome Onboard'));

        return Redirect::home();
    }
}
