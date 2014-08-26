<?php 

$I = new FunctionalTester($scenario);
$I->am('a member');
$I->wantTo('review all users who are registered');

$I->haveAnAccount(['username' => 'foo']);
$I->haveAnAccount(['username' => 'bar']);

$I->amOnPage('/users');
$I->see('foo');
$I->see('bar');