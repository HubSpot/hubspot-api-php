<?php

class ContactUpdateCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->createContact($I->generateRandomEmail());
    }

    public function updateFirstName(AcceptanceTester $I)
    {
        $firstName = 'firstname-'.uniqid();
        $I->fillField(['name' => 'firstname'], $firstName);
        $I->click('#save');
        $I->seeInField(['name' => 'firstname'], $firstName);
    }

    public function assignOwner(AcceptanceTester $I)
    {
        $option = $I->grabTextFrom('#hubspot_owner_id option:nth-child(2)');
        $I->selectOption('#hubspot_owner_id', $option);
        $I->click('#save');
        $I->seeInField(['name' => 'hubspot_owner_id'], $option);
    }
}
