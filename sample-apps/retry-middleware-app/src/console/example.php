<?php

require_once '/app/vendor/autoload.php';

use Helpers\DBClientHelper;
use Helpers\HubspotClientHelper;
use Helpers\OAuth2Helper;

//checking PROCESS_COUNT if it isn't set up it throw exception
checkEnvParam('PROCESS_COUNT');

DBClientHelper::runMigrations();

if (!OAuth2Helper::isAuthenticated()) {
    echo 'In order to continue please go to http://localhost:8999 and authorize via OAuth.'.PHP_EOL;
    while (true) {
        sleep(1);
        if (OAuth2Helper::isAuthenticated()) {
            break;
        }
    }
}

echo "Start\n";
//Pay attention on HubspotClientHelper.
//It generates a custom client with reties middlewares and pass this client to HubSpot Factory.
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
    //Pay attention on HubspotClientHelper.
    //It generates a custom client with reties middlewares and pass this client to HubSpot Factory.
    //Inside loop to avoid token expiration.
    $hubspot = HubspotClientHelper::createFactory();

    echo PHP_EOL.'Request: Get contacts'.PHP_EOL;

    $hubspot->crm()->contacts()->basicApi()->getPage();
}
