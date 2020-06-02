<?php

use Helpers\HubspotClientHelper;
use HubSpot\Client\Crm\Contacts\Model\CollectionResponseSimplePublicObject;

$hubSpot = HubspotClientHelper::createFactory();

//https://developers.hubspot.com/docs/api/crm/contacts
/** @var CollectionResponseSimplePublicObject $contactsPage */
$contactsPage = $hubSpot->crm()->contacts()->basicApi()->getPage();

include __DIR__.'/../../views/contacts/list.php';
