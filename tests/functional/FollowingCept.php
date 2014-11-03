<?php
$I = new FunctionalTester($scenario);

$I->am('I am a GETIX user');
$I->wantTo('follow other GETIX users');

$I->haveAnAccount(['username' => 'OtherUser']);
$I->signIn();

$I->click('Browse Users');
$I->click('OtherUser');

$I->seeCurrentUrlEquals('/@OtherUser');
$I->click('Follow OtherUser');
$I->seeCurrentUrlEquals('/@OtherUser');

$I->see('You are following OtherUser');
$I->dontSee('Follow OtherUser');

