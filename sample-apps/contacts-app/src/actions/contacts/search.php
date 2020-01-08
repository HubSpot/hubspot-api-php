<?php

use Helpers\HubspotClientHelper;
use HubSpot\Client\Crm\Objects\Model\CollectionResponseWithTotalSimplePublicObject;
use HubSpot\Client\Crm\Objects\Model\PublicObjectSearchRequest;
use HubSpot\Crm\ObjectType;

$contacts = [];
$search = $_GET['search'];

if (empty($search)) {
    header('Location: /contacts/list.php');
    exit();
}

$hubSpot = HubspotClientHelper::createFactory();

$searchRequest = new PublicObjectSearchRequest();
$searchRequest->setFilters([
    [
        'propertyName' => 'email',
        'operator' => 'EQ',
        'value' => $search,
    ],
]);

/** @var CollectionResponseWithTotalSimplePublicObject $contactsPage */
$contactsPage = $hubSpot->crm()->objects()->searchApi()->doSearch(ObjectType::CONTACTS, $searchRequest);

include __DIR__.'/../../views/contacts/list.php';
