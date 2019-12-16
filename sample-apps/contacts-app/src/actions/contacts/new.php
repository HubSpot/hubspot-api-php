<?php

$hubSpot = \Helpers\HubspotClientHelper::createFactory();

if (isset($_POST['email'])) {
    $contactInput = new \HubSpot\Client\Crm\Objects\Model\ContactInput();
    $contactInput->setProperties($_POST);
    $contact = $hubSpot->objects()->createNativeObjectsApi()->postcrmv3objectscontacts($contactInput);

    header('Location: /contacts/show.php?id='.$contact['id']);
    exit();
}

$contact = new \HubSpot\Client\Crm\Objects\Model\SimplePublicObject();
$contact->setProperties([
    'email' => null,
]);

include __DIR__.'/../../views/contacts/show.php';
