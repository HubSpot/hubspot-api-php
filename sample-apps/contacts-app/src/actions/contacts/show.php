<?php

use Helpers\ContactPropertiesHelper;
use Helpers\HubspotClientHelper;

$hubSpot = Helpers\HubspotClientHelper::createFactory();

if (!isset($_GET['id'])) {
    throw new \Exception();
}

$contactId = $_GET['id'];
if (isset($_POST['email'])) {
    $contact = new \HubSpot\Client\Crm\Objects\Model\SimplePublicObject();
    $contact->setProperties($_POST);
    $contact = $hubSpot->objects()->basicApi()->update('contact', $contactId, $contact);
    $updated = true;
} else {
    $contact = $hubSpot->objects()->basicApi()->getById('contact', $contactId);
}

include __DIR__.'/../../views/contacts/show.php';
