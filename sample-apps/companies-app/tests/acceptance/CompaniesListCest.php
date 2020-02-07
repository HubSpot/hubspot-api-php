<?php

use Facebook\WebDriver\WebDriverKeys;

class CompaniesListCest
{
    protected $name = 'Test Company';

    protected $domain;

    public function __construct()
    {
        $this->domain = (string) uniqid().'test-company.com';
    }

    public function create(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->click('#newCompany');
        $I->fillField(['name' => 'name'], $this->name);
        $I->fillField(['name' => 'domain'], $this->domain);
        $I->click('#save');
        $I->waitForText('Successfully created Company');

        sleep(5);

        $I->findCompany($this->domain);
    }

    public function update(AcceptanceTester $I)
    {
        $I->findCompany($this->domain);

        $I->click('.showCompany');
        $I->waitForElement('#save');

        $this->name = 'Updated '.$this->name;
        $I->fillField(['name' => 'name'], $this->name);
        $I->click('#save');

        $I->waitForElement('#companiesList');
        $I->findCompany($this->domain);
        $I->see($this->name);
    }

    public function associate(AcceptanceTester $I)
    {
        $I->findCompany($this->domain);

        $I->click('.showCompany');
        $I->waitForElement('#manageContacts');

        $I->click('#manageContacts');
        $I->waitForElement('#contactsList');
        $I->seeElement('#contactsList');
    }

    public function delete(AcceptanceTester $I)
    {
        $I->findCompany($this->domain);

        $I->click('.deleteBtn');
        $I->waitForElement('#companiesList');

        $I->fillField(['name' => 'search'], $this->domain);
        $I->pressKey('#search', WebDriverKeys::ENTER);
        $I->waitForElement('#companiesList');

        $I->dontSee($this->domain, 'td');
    }
}
