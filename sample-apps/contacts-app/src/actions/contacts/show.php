<?php

use HubSpot\Client\Crm\Contacts\Model\SimplePublicObjectInput;
use HubSpot\Crm\ObjectType;

$hubSpot = Helpers\HubspotClientHelper::createFactory();

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
    header('Location: /contacts/show.php?updated=true&id='.$contactId);
    exit();
}

$properties = $hubSpot->crm()->properties()->coreApi()->getAll(ObjectType::CONTACTS)->getResults();
$propertiesToDisplay = ['hubspot_owner_id'];
$propertiesLabels = [
    'hubspot_owner_id' => 'Contact Owner',
];
foreach ($properties as $property) {
    if ('string' === $property->getType() && false === $property->getModificationMetadata()->getReadOnlyValue()) {
        $propertiesToDisplay[] = $property->getName();
        $propertiesLabels[$property->getName()] = $property->getLabel();
    }
}

// https://developers.hubspot.com/docs-beta/crm/contacts
$contact = $hubSpot->crm()->contacts()->basicApi()->getById($contactId, implode(',', $propertiesToDisplay));
// https://developers.hubspot.com/docs-beta/crm/owners
$owners = $hubSpot->crm()->owners()->defaultApi()->getPage()->getResults();

$created = $_GET['created'] ?: false;
$updated = $_GET['updated'] ?: false;

include __DIR__.'/../../views/contacts/show.php';
