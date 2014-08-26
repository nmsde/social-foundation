<?php 
$I = new FunctionalTester($scenario);

$I->am('a member');
$I->wantTo('view my profile.');

$I->signIn();

$I->amOnPage('statuses');

$I->fillField('body', 'walla yalla');
$I->click(Lang::get('status.Send'));

$I->click(Lang::get('account.Your Profile'));

$I->seeCurrentUrlEquals('/@Foobar');
$I->see('walla yalla');