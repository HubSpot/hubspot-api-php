<?php

require_once '/app/vendor/autoload.php';

use Helpers\HubspotClientHelper;
use HubSpot\Client\Crm\Contacts\BatchInputSimplePublicObjectId;
use HubSpot\Client\Crm\Contacts\BatchInputSimplePublicObjectInput;
use HubSpot\Client\Crm\Contacts\SimplePublicObjectId;
use HubSpot\Client\Crm\Contacts\SimplePublicObjectInput;

//$hubspot = HubspotClientHelper::createFactory();

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

//$response = $hubspot->crm()->contacts()->batchApi()->createBatch($emailsList);

//var_dump($response); exit();
