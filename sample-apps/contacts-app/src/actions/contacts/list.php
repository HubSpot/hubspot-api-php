<?php

use Helpers\HubspotClientHelper;
use HubSpot\Client\Crm\Contacts\Model\PublicObjectSearchRequest;
use HubSpot\Client\Crm\Objects\Model\CollectionResponseSimplePublicObject;

$hubSpot = HubspotClientHelper::createFactory();

$searchRequest = new PublicObjectSearchRequest();
$searchRequest->setSorts([
    [
        'propertyName' => 'createdate',
        'direction' => 'DESCENDING',
    ],
]);

// https://developers.hubspot.com/docs-beta/crm/contacts
/** @var CollectionResponseSimplePublicObject $contactsPage */
$contactsPage = $hubSpot->crm()->contacts()->searchApi()->doSearch($searchRequest);

include __DIR__.'/../../views/contacts/list.php';
