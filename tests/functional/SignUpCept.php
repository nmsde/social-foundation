<?php 
$I = new FunctionalTester($scenario);

$I->am('a guest');
$I->wantTo('sign up for a Social account');

// setup
$I->amOnPage('/');
$I->click(Lang::get('account.Register'));
$I->seeCurrentUrlEquals('/register');

// action
$I->fillField('username', 'JohnDoe');
$I->fillField('email', 'john@example.com');
$I->fillField('password', 'demo');
$I->fillField('password_confirmation', 'demo');
$I->click(Lang::get('account.Create Account'));

// See if account was created and user is logged in
$I->see(Lang::get('default.Welcome Onboard'));
$I->seeRecord('users', [
    'username' => 'JohnDoe',
    'email' => 'john@example.com'
]);

Auth::logout();