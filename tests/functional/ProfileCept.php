<?php 
$I = new FunctionalTester($scenario);

$I->am('a member');
$I->wantTo('view my profile.');

// setup
$I->signIn();
$I->amOnPage('statuses');

// action
$I->fillField('body', 'walla yalla');
$I->click(Lang::get('status.Send'));
$I->click(Lang::get('account.Your Profile'));

// watching if status actually is posted to my wall
$I->seeCurrentUrlEquals('/@Foobar');
$I->see('walla yalla');