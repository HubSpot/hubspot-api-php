<?php

use Helpers\HubspotClientHelper;
use HubSpot\Client\Crm\Objects\Model\BatchReadInputSimplePublicObjectId;
use HubSpot\Client\Crm\Objects\Model\CollectionResponseSimplePublicObjectId;
use HubSpot\Client\Crm\Objects\Model\CompanyInput;
use HubSpot\Crm\ObjectType;

if (!isset($_GET['id'])) {
    throw new Exception('Contact id is not specified');
}

$id = $_GET['id'];

$hubSpot = HubspotClientHelper::createFactory();

$company = new CompanyInput([
    'name' => null,
    'domain' => null,
]);

if (isset($_POST['name'])) {
    $company->setProperties($_POST);
    $hubSpot->crm()->companies()->basicApi()->update($id, $company);

    header('Location: /companies/list.php');
    exit();
}

    $company = $hubSpot->crm()->companies()->basicApi()->getById($id);
    /**
     * @var CollectionResponseSimplePublicObjectId
     */
    $contactsIds = $hubSpot->crm()->companies()->associationsApi()->getAssociations(ObjectType::COMPANIES, $id, ObjectType::CONTACTS);

    $contacts = [];

    if (count($contactsIds->getResults()) > 0) {
        $contactsIdsReqest = new BatchReadInputSimplePublicObjectId(['inputs' => $contactsIds->getResults()]);

        $contactsList = $hubSpot->crm()->objects()->batchApi()->readBatch(ObjectType::CONTACTS, true, $contactsIdsReqest);

        $contacts = array_map(function ($contact) {
            return [
                'id' => $contact->getId(),
                'name' => $contact->getProperties()['firstname'].' '.$contact->getProperties()['lastname'],
            ];
        }, (array) $contactsList->getResults());
    }

include __DIR__.'/../../views/companies/show.php';
