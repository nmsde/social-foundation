<?php 
$I = new FunctionalTester($scenario);

$I->am('a guest');
$I->wantTo('sign up for a Social account');

$I->amOnPage('/');
$I->click(Lang::get('account.Register'));
$I->seeCurrentUrlEquals('/register');

$I->fillField('username', 'JohnDoe');
$I->fillField('email', 'john@example.com');
$I->fillField('password', 'demo');
$I->fillField('password_confirmation', 'demo');
$I->click(Lang::get('account.Create Account'));

$I->see(Lang::get('default.Welcome Onboard'));
$I->seeRecord('users', [
    'username' => 'JohnDoe',
    'email' => 'john@example.com'
]);

Auth::logout();