<?php

use Helpers\HubspotClientHelper;
use HubSpot\Client\Crm\Contacts\Model\SimplePublicObjectInput;
use HubSpot\Client\Crm\Objects\Model\SimplePublicObject;

$hubSpot = HubspotClientHelper::createFactory();

if (isset($_POST['email'])) {
    $contactInput = new SimplePublicObjectInput();
    $contactInput->setProperties($_POST);
    // https://developers.hubspot.com/docs-beta/crm/contacts
    $contact = $hubSpot->crm()->contacts()->basicApi()->create($contactInput);

    header('Location: /contacts/show.php?id='.$contact['id'].'&created=true');
    exit();
}

$contact = new SimplePublicObject();
$contact->setProperties([
    'email' => null,
]);

include __DIR__.'/../../views/contacts/show.php';
