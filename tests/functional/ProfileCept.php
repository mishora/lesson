<?php
$I = new FunctionalTester($scenario);
$I->am('a larabook member');
$I->wantTo('I want to view my profile!');

$I->signIn();

$I->amOnPage('statuses');

$I->postAStatus('My new post!');

$I->click('Your Profile');

$I->seeCurrentUrlEquals('/@Foobar');
$I->see('My new post!');

