<?php

class ContactCreateCest
{
    public function createContactWithNotValidEmail(AcceptanceTester $I)
    {
        $notValidEmail = 'acceptance-tester-'.uniqid().'@hubspot';
        $I->createContact($notValidEmail);
        $I->seeElement('.error');
    }

    public function createContact(AcceptanceTester $I)
    {
        $I->createContact($I->generateRandomEmail());
        $I->seeElement('.alert-success.created');
    }
}
