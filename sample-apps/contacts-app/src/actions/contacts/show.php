<?php

use HubSpot\Client\Crm\Objects\Model\SimplePublicObject;
use HubSpot\Crm\ObjectType;

$hubSpot = Helpers\HubspotClientHelper::createFactory();

if (!isset($_GET['id'])) {
    throw new \Exception('Contact id is not specified');
}

$contactId = $_GET['id'];

if (isset($_POST['email'])) {
    $newProperties = new SimplePublicObject();
    $newProperties->setProperties($_POST);
    $contact = $hubSpot->crm()->objects()->basicApi()->update(ObjectType::CONTACT, $contactId, $newProperties);
    $updated = true;
}

$contact = $hubSpot->crm()->objects()->basicApi()->getById(ObjectType::CONTACT, $contactId, 'email,firstname,lastname,hubspot_owner_id');
$owners = $hubSpot->crm()->owners()->defaultApi()->getPage()->getResults();

include __DIR__.'/../../views/contacts/show.php';
