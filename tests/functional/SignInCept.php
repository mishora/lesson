<?php
$I = new FunctionalTester($scenario);

$I->am('a GETIX user');
$I->wantTo('login to my GETIX account');

$I->signIn();

$I->seeInCurrentUrl('/statuses');
$I->see('Welcome back!');
$I->assertTrue(Auth::check());