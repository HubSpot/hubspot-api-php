<?php

require_once '/app/vendor/autoload.php';

use Helpers\HubspotClientHelper;
use Helpers\OAuth2Helper;
use Helpers\RequestListHelper;

//checking PROCESS_COUNT if it isn't set up it throw exception
getEnvOrException('PROCESS_COUNT');

if (!OAuth2Helper::isAuthenticated()) {
    echo 'In order to continue please go to http://localhost:8999 and authorize via OAuth.'.PHP_EOL;
    while (true) {
        sleep(1);
        if (OAuth2Helper::isAuthenticated()) {
            break;
        }
    }
}

echo 'Start'.PHP_EOL;

while (true) {
    echo PHP_EOL.'Request: Get contacts'.PHP_EOL;
    $able = RequestListHelper::ableToPerform();

    while (false == $able) {
        echo 'Able To Perform = '.($able ? 'yes' : 'no').PHP_EOL;
        echo 'Sleeping...'.PHP_EOL;
        sleep(10);
        $able = RequestListHelper::ableToPerform();
    }

    echo 'Able To Perform = '.($able ? 'yes' : 'no').PHP_EOL;

    //Inside loop to avoid token expiration.
    $hubspot = HubspotClientHelper::createFactory();

    RequestListHelper::addTimestamp();

    $hubspot->crm()->contacts()->basicApi()->getPage();

    echo 'Response received'.PHP_EOL;
}
