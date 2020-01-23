<?php

class ContactsListCest
{
    public function contactsListIsDisplayed(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->seeElement('table.contacts-list');
    }
}
