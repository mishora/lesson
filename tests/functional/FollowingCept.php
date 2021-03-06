<?php

$I = new FunctionalTester($scenario);

$I->am('a Larabook user.');

$I->wantTo('Follow other Larabook users.');


$I->haveAnAccount(['username' => 'OtherUser']);
$I->SignIn();

$I->click('Brouse Users');
$I->click('OtherUser');

$I->seeCurrentUrlEquals('/@OtherUser');
$I->click('Follow OtherUser');
$I->seeCurrentUrlEquals('/@OtherUser');

$I->see('Unfollow OtherUser');

$I->click('Unfollow OtherUser');
$I->seeCurrentUrlEquals('/@OtherUser');
$I->click('Follow OtherUser');
