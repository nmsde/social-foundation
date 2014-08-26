<?php namespace Codeception\Module;

use Laracasts\TestDummy\Factory as TestDummy;
// here you can define custom actions
// all public methods declared in helper class will be available in $I

class FunctionalHelper extends \Codeception\Module
{

    public function signIn()
    {
        $username = 'Foobar';
        $email = 'foo@example.com';
        $password = 'bar';

        $this->haveAnAccount(compact('username', 'email', 'password'));

        $I = $this->getModule('Laravel4');
        $I->amOnPage('/login');
        $I->fillField('email', $email);
        $I->fillField('password', $password);
        $I->click('#login-btn');
    }

    public function postAStatus($overrides)
    {
        $this->have('HACKson\Statuses\Status', $overrides);
    }

    public function have($model, $overrides = [])
    {
        return TestDummy::create($model, $overrides);
    }

    public function haveAnAccount($overrides = [])
    {
        return $this->have('HACKson\Users\User', $overrides);
    }
}