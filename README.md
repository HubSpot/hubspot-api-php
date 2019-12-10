# php-hubspot-3
PHP API vNext Client files and sample apps

# How to use

```php
<?php

include_once 'vendor/autoload.php';

$contactInput = new \HubSpot\Client\Crm\Objects\Model\ContactInput();

try {
    $hubSpot = \HubSpot\Factory::createWithApiKey('api-key')->objects();

    $response = $hubSpot->basicApi()->getPage('contact');
    var_dump($response);
    
    $searchRequest = new \HubSpot\Client\Crm\Objects\Model\PublicObjectSearchRequest();
    $searchRequest->setFilters([
        'email' => 'abc@hubspot.com',
    ]);
    $response = $hubSpot->searchApi()->doSearch($searchRequest);
    var_dump($response);
    
} catch (\HubSpot\Client\Crm\Objects\ApiException $e) {
    var_dump($e);
}

```
