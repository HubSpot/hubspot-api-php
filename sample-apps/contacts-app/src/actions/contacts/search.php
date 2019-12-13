<?php

$contacts = [];
$search = $_GET['search'];

if (empty($search)) {
    header('Location: /contacts/list.php');
    exit();
}

$hubSpot = Helpers\HubspotClientHelper::createFactory();

$searchRequest = new \HubSpot\Client\Crm\Objects\Model\PublicObjectSearchRequest();
$searchRequest->setFilters([
    [
        'propertyName' => 'email',
        'operator' => 'EQ',
        'value' => $search,
    ],
]);

/** @var \HubSpot\Client\Crm\Objects\Model\CollectionResponseWithTotalSimplePublicObject $contactsPage */
$contactsPage = $hubSpot->objects()->searchApi()->doSearch('contact', $searchRequest);

include __DIR__.'/../../views/contacts/list.php';
