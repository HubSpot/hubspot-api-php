<?php

use Helpers\HubspotClientHelper;
use HubSpot\Client\Crm\Contacts\Model\CollectionResponseSimplePublicObject;
use HubSpot\Client\Crm\Contacts\Model\PublicObjectSearchRequest;
use HubSpot\Crm\ObjectType;

$hubSpot = HubspotClientHelper::createFactory();

$searchRequest = new PublicObjectSearchRequest();
$searchRequest->setSorts([
    [
        'propertyName' => 'createdate',
        'direction' => 'DESCENDING',
    ],
]);

// https://developers.hubspot.com/docs-beta/crm/search
/** @var CollectionResponseSimplePublicObject $contactsPage */
$contactsPage = $hubSpot->crm()->objects()->searchApi()->doSearch(ObjectType::CONTACTS, $searchRequest);

include __DIR__.'/../../views/contacts/list.php';
