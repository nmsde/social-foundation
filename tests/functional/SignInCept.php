<?php 
$I = new FunctionalTester($scenario);
$I->am('a member');
$I->wantTo('login to my account');

$I->signIn();

$I->seeInCurrentUrl('/statuses');
$I->see(Lang::get('default.Welcome Back'));

Auth::logout();