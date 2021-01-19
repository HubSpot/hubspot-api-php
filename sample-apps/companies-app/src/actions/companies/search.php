<?php

use Helpers\HubspotClientHelper;
use HubSpot\Client\Crm\Companies\Model\CollectionResponseWithTotalSimplePublicObject;
use HubSpot\Client\Crm\Companies\Model\Filter;
use HubSpot\Client\Crm\Companies\Model\FilterGroup;
use HubSpot\Client\Crm\Companies\Model\PublicObjectSearchRequest;

if (empty($_GET['search'])) {
    header('Location: /companies/list');

    exit();
}

$hubSpot = HubspotClientHelper::createFactory();

$filter = new Filter();

$filter->setPropertyName('domain');
$filter->setOperator('EQ');
$filter->setValue($_GET['search']);

$filterGroup = new FilterGroup();
$filterGroup->setFilters([$filter]);

$searchRequest = new PublicObjectSearchRequest();
$searchRequest->setFilterGroups([$filterGroup]);

/** @var CollectionResponseWithTotalSimplePublicObject $companiesPage */
$companiesPage = $hubSpot->crm()->companies()->searchApi()
    ->doSearch($searchRequest)
;

include __DIR__.'/../../views/companies/list.php';
