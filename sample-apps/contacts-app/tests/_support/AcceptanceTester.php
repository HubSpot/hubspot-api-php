<?php

/**
 * Inherited Methods.
 *
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method void pause()
 *
 * @SuppressWarnings(PHPMD)
 */
class AcceptanceTester extends \Codeception\Actor
{
    use _generated\AcceptanceTesterActions;

    public function createContact(string $email)
    {
        $this->amOnPage('/');
        $this->click('#contact-new');
        $this->fillField(['name' => 'email'], $email);
        $this->click('#save');
    }

    public function generateRandomEmail()
    {
        return 'acceptance-tester-'.uniqid().'@hubspot.com';
    }

    // Define custom actions here
}
