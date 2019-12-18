<?php

use Helpers\ContactPropertiesHelper;
use Helpers\HubspotClientHelper;
use HubSpot\Client\Crm\Objects\Model\SimplePublicObject;

$hubSpot = Helpers\HubspotClientHelper::createFactory();

if (!isset($_GET['id'])) {
    throw new \Exception('Contact id is not specified');
}

$contactId = $_GET['id'];

if (isset($_POST['email'])) {
    $contact = new SimplePublicObject();
    $contact->setProperties($_POST);
    $contact = $hubSpot->objects()->basicApi()->update('contact', $contactId, $contact);
    $updated = true;
} else {
    $contact = $hubSpot->objects()->basicApi()->getById('contact', $contactId);
}

$owners = $hubSpot->owners()->defaultApi()->getPage()->getResults();

include __DIR__.'/../../views/contacts/show.php';
