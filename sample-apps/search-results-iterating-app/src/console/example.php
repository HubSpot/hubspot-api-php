<?php

require_once '/app/vendor/autoload.php';

use Helpers\OAuth2Helper;
use Helpers\SearchHelper;

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
$after = null;

while (true) {
    $response = SearchHelper::getContacts(
        getEnvOrException('SEARCH_QUERY'),
        $after,
        getEnvOrException('SEARCH_BATCH_SIZE')
    );

    $count = count($response->getResults());

    if ($count < 1) {
        break;
    }

    foreach ($response->getResults() as $contact) {
        echo $contact->getId().PHP_EOL;
    }

    $after = $response->getResults()[$count - 1]->getId();
}

echo 'End'.PHP_EOL;
