<?php

class ContactManipulationCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->createContact('mike@mailforspam.com');
    }

    public function updatePropertiesInvalidData(AcceptanceTester $I)
    {
        $I->fillField(['name' => 'associatedcompanyid'], rand(10000000, getrandmax()).rand(10000000, getrandmax()));
        $I->click('#save');
        $I->seeElement('.error-wrapper');
    }

    public function updatePropertiesValidData(AcceptanceTester $I)
    {
        $I->fillField(['name' => 'company_size'], 71);
        $I->fillField(['name' => 'date_of_birth'], '10.10.2010');
        $I->fillField(['name' => 'firstname'], 'Mike');
        $I->fillField(['name' => 'gender'], 'man');
        $I->fillField(['name' => 'phone'], '+1234566789');
        $I->fillField(['name' => 'city'], 'LAX');
        $I->fillField(['name' => 'state'], 'CA');
        $I->fillField(['name' => 'country'], 'USA');
        $I->click('#save');
        $I->seeElement('.alert-success');
    }

    public function addingEngagements(AcceptanceTester $I)
    {
        $datetime = (new DateTime())
            ->add(new DateInterval('P1D'))
        ;
        $format = 'Y-m-d H:i:s';

        $I->click('#engagement-new');
        $title = 'Hubspot team meeting';

        $I->selectOption(['name' => 'engagement[type]'], 'MEETING');
        $I->fillField(['name' => 'metadata[title]'], $title);
        $I->fillField(['name' => 'metadata[body]'], 'Discussion of Hubspot\'s API');
        $I->fillField(['name' => 'metadata[startTime]'], $datetime->setTime(12, 30)->format($format));
        $I->fillField(['name' => 'metadata[endTime]'], $datetime->setTime(14, 00)->format($format));

        $I->click('#save');

        $I->see($title);
    }

    public function search(AcceptanceTester $I)
    {
        $I->click('#contacts-list');
        $I->submitForm('#search-form', ['search' => 'mike@mailforspam.com']);
        $I->see('Mike');
    }
}
