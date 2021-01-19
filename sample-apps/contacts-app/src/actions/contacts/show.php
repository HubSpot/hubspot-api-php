<?php

use Helpers\ContactPropertiesHelper;
use Helpers\HubspotClientHelper;
use HubSpot\Client\Crm\Contacts\Model\SimplePublicObjectInput;

$hubSpot = HubspotClientHelper::createFactory();

if (!isset($_GET['id'])) {
    throw new \Exception('Contact id is not specified');
}
$contactId = $_GET['id'];

if (isset($_POST['buttonDelete'])) {
    // https://developers.hubspot.com/docs-beta/crm/contacts
    $hubSpot->crm()->contacts()->basicApi()->archive($contactId);
    header('Location: /');

    exit();
}

if (isset($_POST['email'])) {
    $newProperties = new SimplePublicObjectInput();
    $newProperties->setProperties($_POST);
    $hubSpot->crm()->contacts()->basicApi()->update($contactId, $newProperties);
    header('Location: /contacts/show?updated=true&id='.$contactId);

    exit();
}

$propertiesToDisplay = ContactPropertiesHelper::getDisplayProperties(['hubspot_owner_id']);

$propertiesLabels = ContactPropertiesHelper::getPropertiesLabels([
    'hubspot_owner_id' => 'Contact Owner',
]);

// https://developers.hubspot.com/docs-beta/crm/contacts
$contact = $hubSpot->crm()->contacts()->basicApi()->getById($contactId, implode(',', $propertiesToDisplay));
// https://developers.hubspot.com/docs-beta/crm/owners
$owners = $hubSpot->crm()->owners()->defaultApi()->getPage()->getResults();

$created = $_GET['created'] ?: false;
$updated = $_GET['updated'] ?: false;

include __DIR__.'/../../views/contacts/show.php';
