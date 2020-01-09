<?php

class ContactsListCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function contactsListIsDisplayed(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->seeElement('table.contacts-list');
    }
}
