<?php

use Helpers\HubspotClientHelper;
use HubSpot\Client\Crm\Objects\Model\CollectionResponseWithTotalSimplePublicObject;
use HubSpot\Client\Crm\Objects\Model\PublicObjectSearchRequest;
use HubSpot\Crm\ObjectType;

if (empty($_GET['search'])) {
    header('Location: /companies/list.php');
    exit();
}

$hubSpot = HubspotClientHelper::createFactory();

$searchRequest = new PublicObjectSearchRequest();
$searchRequest->setFilters([
    [
        'propertyName' => 'domain',
        'operator' => 'EQ',
        'value' => $_GET['search'],
    ],
]);
/** @var CollectionResponseWithTotalSimplePublicObject $companiesPage */
$companiesPage = $hubSpot->crm()->objects()->searchApi()->doSearch(ObjectType::COMPANIES, $searchRequest);

include __DIR__.'/../../views/companies/list.php';
