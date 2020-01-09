<?php

class ContactCreateCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function creatingContactInvalidData(AcceptanceTester $I)
    {
        $I->createContact('acceptance-tester-'.uniqid().'@hubspot');
        $I->seeElement('.error');
    }

    public function creatingContactValidData(AcceptanceTester $I)
    {
        $I->createContact('acceptance-tester-'.uniqid().'@hubspot.com');
        $I->seeElement('.alert-success.created');
    }
}
