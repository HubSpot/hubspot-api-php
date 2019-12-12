<?php

class ContactsCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function contactsPageIsDisplayed(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->seeElement('table.contacts-list');
    }

    public function creatingContactInvalidData(AcceptanceTester $I)
    {
        $I->createContact('mike@mailforspam');
        $I->seeElement('.error-wrapper');
    }

    public function creatingContactValidData(AcceptanceTester $I)
    {
        $I->createContact('mike@mailforspam.com');
        $I->seeElement('.alert-success');
    }
}
