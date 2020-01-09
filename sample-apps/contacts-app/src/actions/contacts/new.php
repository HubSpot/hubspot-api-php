<?php

use HubSpot\Client\Crm\Objects\Model\ContactInput;
use HubSpot\Client\Crm\Objects\Model\SimplePublicObject;

$hubSpot = \Helpers\HubspotClientHelper::createFactory();

if (isset($_POST['email'])) {
    $contactInput = new ContactInput();
    $contactInput->setProperties($_POST);
    $contact = $hubSpot->crm()->objects()->createNativeObjectsApi()->createContact($contactInput);

    header('Location: /contacts/show.php?id='.$contact['id'].'&created=true');
    exit();
}

$contact = new SimplePublicObject();
$contact->setProperties([
    'email' => null,
]);

include __DIR__.'/../../views/contacts/show.php';
