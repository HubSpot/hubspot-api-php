<?php

class AuthorizationCest
{
    public function OAuth2(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->click('#oauthPage');
        $I->waitForElement('#OAuthBtn');

        $I->click('#OAuthBtn');
        $I->waitForElement('#loginBtn');

        $I->fillField('#username', $_ENV['HUBSPOT_LOGIN']);
        $I->fillField('#password', $_ENV['HUBSPOT_PASSWORD']);
        $I->click('#loginBtn');

        $element = 'td>a[href*="'.$_ENV['HUBSPOT_PORTAL_ID'].'"]';
        $I->waitForElement($element);
        $I->click($element);

        $I->waitForElement('#companiesList');
    }
}
