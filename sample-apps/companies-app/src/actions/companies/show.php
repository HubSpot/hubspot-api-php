<?php

use Helpers\HubspotClientHelper;
use HubSpot\Crm\ObjectType;
use HubSpot\Client\Crm\Objects\Model\CompanyInput;
use HubSpot\Client\Crm\Objects\Model\CollectionResponseSimplePublicObjectId;
use HubSpot\Client\Crm\Objects\Model\BatchReadInputSimplePublicObjectId;

if (!isset($_GET['id'])) {
    throw new \Exception('Contact id is not specified');
}

$id = $_GET['id'];

$hubSpot = HubspotClientHelper::createFactory();

$company = new CompanyInput([
    'name' => null,
    'domain' => null,
]);

if (isset($_POST['name'])) {
    $company->setProperties($_POST);
    $hubSpot->crm()->objects()->basicApi()->update(ObjectType::COMPANIES, $id, $company);
    
    header('Location: /companies/list.php');
    exit();
} else {
    
    $company = $hubSpot->crm()->objects()->basicApi()->getById(ObjectType::COMPANIES, $id);
    /**
     * @var CollectionResponseSimplePublicObjectId $contactsIds
     */
    $contactsIds = $hubSpot->crm()->objects()->associationsApi()->getAssociations(ObjectType::COMPANIES, $id, ObjectType::CONTACTS);
    $contacts = [];
    if (count($contactsIds->getResults()) > 0) {
        $contactsIdsReqest = new BatchReadInputSimplePublicObjectId(['inputs' => $contactsIds->getResults()]);
        
        $contactsObj = $hubSpot->crm()->objects()->batchApi()->readBatch(ObjectType::CONTACTS, true, $contactsIdsReqest);
        var_dump($contactsObj); exit();
        $contacts = array_map(function ($contact) {
            return [
                'id' => $contact->vid,
                'name' => $contact->properties->firstname->value.' '.$contact->properties->lastname->value,
            ];
        }, (array) $contactsObj);
    }
}

include __DIR__.'/../../views/companies/show.php';
