<?php
$I = new FunctionalTester($scenario);
$I->am('a Social member');
$I->wantTo('I want to post statuses to my profile');

$I->signIn();


$I->amOnPage('statuses');

$I->fillField('body', 'My first post.');
$I->click(Lang::get('status.Send'));

$I->seeCurrentUrlEquals('/statuses');
$I->see('My first post.');