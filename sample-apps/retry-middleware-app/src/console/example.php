<?php

require_once '/app/vendor/autoload.php';

use Helpers\HubspotClientHelper;
use HubSpot\Client\Crm\Contacts\Model\BatchInputSimplePublicObjectId;
use HubSpot\Client\Crm\Contacts\Model\BatchInputSimplePublicObjectInput;
use HubSpot\Client\Crm\Contacts\Model\SimplePublicObjectId;
use HubSpot\Client\Crm\Contacts\Model\SimplePublicObjectInput;

$hubspot = HubspotClientHelper::createFactory();

$emails = [];
for ($i = 0; $i < 3; $i++) {
    $contact =  new  SimplePublicObjectInput();
    
    $contact->setProperties([
        'email' => 'retryMiddlewareApp'.uniqid().'@hubspot.com',
    ]);
    
    $emails[] = $contact;
}

$emailsList = new BatchInputSimplePublicObjectInput();
$emailsList->setInputs($emails);

$response = $hubspot->crm()->contacts()->batchApi()->createBatch($emailsList);

$ids = array_map(function ($contact) {
        $id = new SimplePublicObjectId();
        $id->setId($contact->getId());
        
        return $id;
    }, $response->getResults());
    
$idsList = new BatchInputSimplePublicObjectId();
$idsList->setInputs($ids);

$hubspot->crm()->contacts()->batchApi()->archiveBatch($idsList);

