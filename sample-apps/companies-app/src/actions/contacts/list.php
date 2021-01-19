<?php

use Helpers\HubspotClientHelper;
use HubSpot\Client\Crm\Contacts\Model\Filter;
use HubSpot\Client\Crm\Contacts\Model\FilterGroup;
use HubSpot\Client\Crm\Contacts\Model\PublicObjectSearchRequest;
use HubSpot\Crm\ObjectType;

$hubSpot = HubspotClientHelper::createFactory();

if (isset($_GET['companyId'])) {
    $companyId = $_GET['companyId'];
} else {
    throw new Exception('Company id is not specified');
}

if (isset($_GET['search'])) {
    $filter = new Filter();

    $filter->setPropertyName('email');
    $filter->setOperator('EQ');
    $filter->setValue($_GET['search']);

    $filterGroup = new FilterGroup();
    $filterGroup->setFilters([$filter]);

    $searchRequest = new PublicObjectSearchRequest();
    $searchRequest->setFilterGroups([$filterGroup]);

    $contactList = $hubSpot->crm()->contacts()->searchApi()
        ->doSearch($searchRequest)
    ;
} else {
    $contactList = $hubSpot->crm()->contacts()->basicApi()->getPage(20);
}

$associatedContacts = [];
if (count($contactList->getResults()) > 0) {
    $associationResponse = $hubSpot->crm()->companies()->associationsApi()
        ->getAll($companyId, ObjectType::CONTACTS)->getResults();

    if (!empty($associationResponse)) {
        $associatedContacts = array_map(function ($contact) {
            return $contact->getId();
        }, $associationResponse);
    }
}

include __DIR__.'/../../views/contacts/list.php';
