<?php

use Helpers\HubspotClientHelper;
use HubSpot\Client\Crm\Contacts\Model\Filter;
use HubSpot\Client\Crm\Contacts\Model\FilterGroup;
use HubSpot\Client\Crm\Contacts\Model\PublicObjectSearchRequest;

$contacts = [];
$search = $_GET['search'];

if (empty($search)) {
    header('Location: /contacts/list');

    exit();
}

$filter = new Filter();
$filter
    ->setOperator('EQ')
    ->setPropertyName('email')
    ->setValue($search)
;
$filterGroup = new FilterGroup();
$filterGroup->setFilters([$filter]);
$searchRequest = new PublicObjectSearchRequest();
$searchRequest->setFilterGroups([$filterGroup]);

// @var CollectionResponseWithTotalSimplePublicObject $contactsPage
$hubSpot = HubspotClientHelper::createFactory();
// https://developers.hubspot.com/docs-beta/crm/contacts
$contactsPage = $hubSpot->crm()->contacts()->searchApi()->doSearch($searchRequest);

include __DIR__.'/../../views/contacts/list.php';
