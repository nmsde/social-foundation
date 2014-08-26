<?php

$I = new FunctionalTester($scenario);

$I->am('a member');
$I->wantTo('follow other users');

// setup
$I->haveAnAccount(['username' => 'AnOtherUser']);
$I->signIn();

// action
$I->click(Lang::get('default.navigation.Find Members'));
$I->click('AnOtherUser');

// When I follow a user
$I->seeCurrentUrlEquals('/@AnOtherUser');
$I->click(Lang::get('default.follow') . ' AnOtherUser');
$I->seeCurrentUrlEquals('/@AnOtherUser');
$I->see(Lang::get('default.unfollow'));
$I->dontSee(Lang::get('default.follow') . ' AnOtherUser');

// When I unfollow a user
$I->click(Lang::get('default.unfollow'));
$I->seeCurrentUrlEquals('/@AnOtherUser');
$I->see(Lang::get('default.follow') . ' AnOtherUser');