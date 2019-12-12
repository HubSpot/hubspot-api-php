<?php

class PropertiesCest
{
    protected $validName;

    public function __construct()
    {
        $this->validName = 'name'.uniqid();
    }

    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->click('#properties-list');
    }

    // tests
    public function propertiesPageIsDisplayed(AcceptanceTester $I)
    {
        $I->seeElement('table.properties-list');
    }

    public function creatingPropertyInvalidData(AcceptanceTester $I)
    {
        $I->click('#new-property');
        $I->fillField(['name' => 'name'], 'INVALIDNAME');
        $I->fillField(['name' => 'groupName'], 'INVALIDGROUPNAME');
        $I->click('save');
        $I->seeElement('.error-wrapper');
    }

    public function creatingPropertyValidData(AcceptanceTester $I)
    {
        $I->click('#new-property');
        $I->fillField(['name' => 'name'], $this->validName);
        $I->fillField(['name' => 'label'], 'valid label');
        $I->fillField(['name' => 'description'], 'valid description');
        $I->fillField(['name' => 'groupName'], 'contactinformation');
        $I->click('save');
        $I->seeElement('table.properties-list');
        $I->see($this->validName);
    }

    public function updatingPropertyInvalidData(AcceptanceTester $I)
    {
        $I->click($this->validName);
        $I->fillField(['name' => 'groupName'], 'INVALIDGROUPNAME');
        $I->click('save');
        $I->seeElement('.error-wrapper');
    }

    public function updatingPropertyValidData(AcceptanceTester $I)
    {
        $I->click($this->validName);
        $I->fillField(['name' => 'label'], 'valid label changed');
        $I->fillField(['name' => 'description'], 'valid description changed');
        $I->click('save');
        $I->seeElement('table.properties-list');
        $I->see($this->validName);
    }

    public function removeProperty(AcceptanceTester $I)
    {
        $I->click('#remove-'.$this->validName);
        $I->seeElement('table.properties-list');
        $I->dontSee($this->validName);
    }
}
