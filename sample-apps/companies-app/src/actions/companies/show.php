<?php

use Helpers\HubspotClientHelper;
use HubSpot\Client\Crm\Associations\Model\BatchInputPublicObjectId;
use HubSpot\Client\Crm\Companies\Model\CollectionResponseSimplePublicObjectId;
use HubSpot\Client\Crm\Companies\Model\SimplePublicObjectInput;
use HubSpot\Client\Crm\Contacts\Model\BatchReadInputSimplePublicObjectId;
use HubSpot\Client\Crm\Contacts\Model\SimplePublicObjectId;
use HubSpot\Crm\ObjectType;

if (!isset($_GET['id'])) {
    throw new Exception('Contact id is not specified');
}

$id = $_GET['id'];

$hubSpot = HubspotClientHelper::createFactory();

$company = new SimplePublicObjectInput([
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
$inputId = new BatchInputPublicObjectId();
$inputId->setInputs([$id]);
$contactsIds = $hubSpot->crm()->associations()->batchApi()
    ->readBatch(ObjectType::COMPANIES, ObjectType::CONTACTS, $inputId)
    ->getResults()
;

$contacts = [];
if (!empty($contactsIds)) {
    $contactsIdsRequest = new BatchReadInputSimplePublicObjectId();
    $contactsIdsRequest->setInputs(
        array_map(function ($objectId) {
            return (new SimplePublicObjectId())->setId($objectId->getId());
        }, $contactsIds[0]->getTo())
    );

    $contactsList = $hubSpot->crm()->contacts()->batchApi()
        ->readBatch(false, $contactsIdsRequest)
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
