<?php

$I = new FunctionalTester($scenario);
$I->am('a GETIX member');
$I->wantTo('I want to post status to my profile!');

$I->signIn();

$I->amOnPage('statuses');

$I->postAStatus('My first post!');

$I->seeCurrentUrlEquals('/statuses');
$I->see('My first post!');