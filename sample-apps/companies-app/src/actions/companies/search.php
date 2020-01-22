<?php

use Helpers\HubspotClientHelper;
use HubSpot\Client\Crm\Companies\Model\CollectionResponseWithTotalSimplePublicObject;
use HubSpot\Client\Crm\Companies\Model\PublicObjectSearchRequest;
use HubSpot\Client\Crm\Companies\Model\Filter;
use HubSpot\Client\Crm\Companies\Model\FilterGroup;

if (empty($_GET['search'])) {
    header('Location: /companies/list.php');
    exit();
}

$hubSpot = HubspotClientHelper::createFactory();
$filter = new Filter([
    'property_name' => 'domain',
    'operator' => 'EQ',
    'value' => $_GET['search'],
]);
$filterGroup = new FilterGroup([
    'filters' => [
        $filter,
    ],
]); 

$searchRequest = new PublicObjectSearchRequest();
$searchRequest->setFilterGroups([$filterGroup]);
/** @var CollectionResponseWithTotalSimplePublicObject $companiesPage */
$companiesPage = $hubSpot->crm()->companies()->searchApi()->doSearch($searchRequest);

include __DIR__.'/../../views/companies/list.php';
