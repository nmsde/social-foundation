<?php
$I = new FunctionalTester($scenario);
$I->am('a Social member');
$I->wantTo('I want to post statuses to my profile');

// I sign in
$I->signIn();
$I->amOnPage('statuses');

// I write a status
$I->fillField('body', 'My first post.');
$I->click(Lang::get('status.Send'));

// I am watching a status
$I->seeCurrentUrlEquals('/statuses');
$I->see('My first post.');