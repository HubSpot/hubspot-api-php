<?php

use Helpers\HubspotClientHelper;
use HubSpot\Crm\ObjectType;
use HubSpot\Client\Crm\Objects\Model\PublicObjectSearchRequest;

$hubSpot = HubspotClientHelper::createFactory();

if (isset($_GET['companyId'])) {
    $companyId = $_GET['companyId'];
} else {
    throw new Exception('Company id is not specified');
}

if (isset($_GET['search'])) {
    $searchRequest = new PublicObjectSearchRequest();
    $searchRequest->setFilters([
        [
            'propertyName' => 'email',
            'operator' => 'EQ',
            'value' => $_GET['search'],
        ],
    ]);
    
    $contactList = $hubSpot->crm()->objects()->searchApi()->doSearch(ObjectType::CONTACTS, $searchRequest);
} else {
    $contactList = $hubSpot->crm()->objects()->basicApi()->getPage(ObjectType::CONTACTS, 20);
}

$associatedContacts = [];
if (count($contactList->getResults()) > 0) {
    $associationResponse = $hubSpot->crm()->objects()->associationsApi()->getAssociations(ObjectType::COMPANIES, $companyId, ObjectType::CONTACTS);
    
    $associatedContacts = array_map(function ($contact) {
            return $contact->getId();
        }, (array) $associationResponse->getResults());
}
include __DIR__.'/../../views/contacts/list.php';
