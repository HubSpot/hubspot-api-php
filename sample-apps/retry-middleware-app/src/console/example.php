<?php

require_once '/app/vendor/autoload.php';

use Helpers\DBClientHelper;
use Helpers\HubspotClientHelper;
use Helpers\OAuth2Helper;
use HubSpot\Client\Crm\Contacts\Model\BatchInputSimplePublicObjectId;
use HubSpot\Client\Crm\Contacts\Model\BatchInputSimplePublicObjectInput;
use HubSpot\Client\Crm\Contacts\Model\SimplePublicObjectId;
use HubSpot\Client\Crm\Contacts\Model\SimplePublicObjectInput;

//checking PROCESS_COUNT if it isn't set up it throw exception
checkEnvParam('PROCESS_COUNT');

DBClientHelper::runMigrations();

if (!OAuth2Helper::isAuthenticated()) {
    echo "In order to continue please go to http://localhost:8999 and authorize via OAuth.\n";
    while (true) {
        sleep(1);
        if (OAuth2Helper::isAuthenticated()) {
            break;
        }
    }
}

echo "Start\n";
//Pay attention on HubspotClientHelper.
//It generate custom client with reties middlewares and pass this client to HubSpot Factory. 
$hubspot = HubspotClientHelper::createFactory();

$emails = [];
for ($i = 0; $i < 3; ++$i) {
    $contact = new  SimplePublicObjectInput();

    $contact->setProperties([
        'email' => 'retryMiddlewareApp'.uniqid().'@hubspot.com',
    ]);

    $emails[] = $contact;
}

$emailsList = new BatchInputSimplePublicObjectInput();
$emailsList->setInputs($emails);

while (true) {
    echo "Create contacts\n";
    $response = $hubspot->crm()->contacts()->batchApi()->createBatch($emailsList);

    $ids = array_map(function ($contact) {
        $id = new SimplePublicObjectId();
        $id->setId($contact->getId());

        return $id;
    }, $response->getResults());

    $idsList = new BatchInputSimplePublicObjectId();
    $idsList->setInputs($ids);

    echo "Delete contacts\n";
    $hubspot->crm()->contacts()->batchApi()->archiveBatch($idsList);
}
