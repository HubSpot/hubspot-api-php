<?php

use Helpers\HubspotClientHelper;
use HubSpot\Client\Crm\Objects\Model\CollectionResponseSimplePublicObject;

$hubSpot = HubspotClientHelper::createFactory();

// https://developers.hubspot.com/docs/methods/contacts/get_contacts
/** @var CollectionResponseSimplePublicObject $contactsPage */
$contactsPage = $hubSpot->objects()->basicApi()->getPage('contact');

include __DIR__.'/../../views/contacts/list.php';
