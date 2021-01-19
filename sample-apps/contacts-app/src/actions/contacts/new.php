<?php

use Helpers\HubspotClientHelper;
use HubSpot\Client\Crm\Contacts\Model\SimplePublicObject;
use HubSpot\Client\Crm\Contacts\Model\SimplePublicObjectInput;

$hubSpot = HubspotClientHelper::createFactory();

if (isset($_POST['email'])) {
    $contactInput = new SimplePublicObjectInput();
    $contactInput->setProperties($_POST);
    // https://developers.hubspot.com/docs-beta/crm/contacts
    $contact = $hubSpot->crm()->contacts()->basicApi()->create($contactInput);

    header('Location: /contacts/show?id='.$contact['id'].'&created=true');

    exit();
}

$contact = new SimplePublicObject();
$contact->setProperties([
    'email' => null,
]);

$propertiesToDisplay = ['email'];

$propertiesLabels = [
    'email' => 'Email',
];

include __DIR__.'/../../views/contacts/show.php';
