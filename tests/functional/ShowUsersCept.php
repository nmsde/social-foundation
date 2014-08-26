<?php 

$I = new FunctionalTester($scenario);
$I->am('a member');
$I->wantTo('review all users who are registered');

// setup
$I->haveAnAccount(['username' => 'foo']);
$I->haveAnAccount(['username' => 'bar']);

// action
$I->amOnPage('/users');
$I->see('foo');
$I->see('bar');