<?php

use Helpers\HubspotClientHelper;

$hubSpot = HubspotClientHelper::createFactory();

// https://developers.hubspot.com/docs/methods/contacts/get_contacts
/** @var \HubSpot\Client\Crm\Objects\Model\CollectionResponseSimplePublicObject $contactsPage */
$contactsPage = $hubSpot->objects()->basicApi()->getPage('contact');

include __DIR__.'/../../views/contacts/list.php';
