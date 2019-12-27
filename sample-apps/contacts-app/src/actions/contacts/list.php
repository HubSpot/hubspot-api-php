<?php

use Helpers\HubspotClientHelper;
use HubSpot\Client\Crm\Objects\Model\CollectionResponseSimplePublicObject;
use HubSpot\Crm\ObjectType;

$hubSpot = HubspotClientHelper::createFactory();

// https://developers.hubspot.com/docs/methods/contacts/get_contacts
/** @var CollectionResponseSimplePublicObject $contactsPage */
$contactsPage = $hubSpot->crm()->objects()->basicApi()->getPage(ObjectType::CONTACT);

include __DIR__.'/../../views/contacts/list.php';
