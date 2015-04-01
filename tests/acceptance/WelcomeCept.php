<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('Test the Welcome Index Page');
$I->amOnPage('/welcome');

// Ensure we see the right content
$I->see('Hello World');

// Ensure "welcome" is in the config
\Configure::write('welcome', 123);
$I->seeInConfig('welcome');
