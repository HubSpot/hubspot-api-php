<?php

use Helpers\HubspotClientHelper;
use HubSpot\Client\Crm\Companies\Model\SimplePublicObjectInput;
use HubSpot\Client\Crm\Contacts\Model\BatchReadInputSimplePublicObjectId;
use HubSpot\Client\Crm\Contacts\Model\SimplePublicObjectId;
use HubSpot\Crm\ObjectType;

if (!isset($_GET['id'])) {
    throw new Exception('Contact id is not specified');
}

$id = $_GET['id'];

$hubSpot = HubspotClientHelper::createFactory();

if (isset($_POST['name'])) {
    $company = new SimplePublicObjectInput([
        'name' => null,
        'domain' => null,
    ]);
    $company->setProperties($_POST);
    $hubSpot->crm()->companies()->basicApi()->update($id, $company);

    header('Location: /companies/list');

    exit();
}

$company = $hubSpot->crm()->companies()->basicApi()->getById($id);

$contactsIds = $hubSpot->crm()->companies()->associationsApi()
    ->getAll($id, ObjectType::CONTACTS)->getResults();

$contacts = [];
if (!empty($contactsIds)) {
    $contactsIdsRequest = new BatchReadInputSimplePublicObjectId();
    $contactsIdsRequest->setInputs(
        array_map(function ($objectId) {
            return (new SimplePublicObjectId())->setId($objectId->getId());
        }, array_slice($contactsIds, 0, 20))
    );

    $contactsList = $hubSpot->crm()->contacts()->batchApi()
        ->read($contactsIdsRequest)
    ;

    $contacts = array_map(function ($contact) {
        return [
            'id' => $contact->getId(),
            'name' => $contact->getProperties()['firstname']
                .' '.$contact->getProperties()['lastname'],
        ];
    }, (array) $contactsList->getResults());
}

include __DIR__.'/../../views/companies/show.php';
