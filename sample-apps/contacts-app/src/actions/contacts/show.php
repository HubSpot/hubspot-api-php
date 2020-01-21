<?php

use HubSpot\Client\Crm\Objects\Model\SimplePublicObject;
use HubSpot\Crm\ObjectType;

$hubSpot = Helpers\HubspotClientHelper::createFactory();

if (!isset($_GET['id'])) {
    throw new \Exception('Contact id is not specified');
}
$contactId = $_GET['id'];

if (isset($_POST['buttonDelete'])) {
    $hubSpot->crm()->objects()->basicApi()->archive(ObjectType::CONTACTS, $contactId);
    header('Location: /');
    exit();
}

$created = $_GET['created'] ?: false;
$updated = false;

if (isset($_POST['email'])) {
    $newProperties = new SimplePublicObject();
    $newProperties->setProperties($_POST);
    $contact = $hubSpot->crm()->objects()->basicApi()->update(ObjectType::CONTACTS, $contactId, $newProperties);
    $updated = true;
}

$properties = $hubSpot->crm()->properties()->coreApi()->getAll(ObjectType::CONTACTS)->getResults();
$propertiesToDisplay = ['hubspot_owner_id'];
foreach ($properties as $property) {
    if ('string' === $property->getType() && false === $property->getModificationMetadata()->getReadOnlyValue()) {
        $propertiesToDisplay[] = $property->getName();
    }
}

$contact = $hubSpot->crm()->objects()->basicApi()->getById(ObjectType::CONTACTS, $contactId, implode(',', $propertiesToDisplay));

$owners = $hubSpot->crm()->owners()->defaultApi()->getPage()->getResults();

include __DIR__.'/../../views/contacts/show.php';
