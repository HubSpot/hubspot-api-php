# hubspot-api-php

[![Latest Packagist Version](https://img.shields.io/packagist/v/hubspot/api-client?logo=github&logoColor=white&style=flat-square)](https://packagist.org/packages/hubspot/api-client)
[![Total Downloads](https://img.shields.io/packagist/dt/hubspot/api-client.svg?logo=github&logoColor=white&style=flat-square)](https://packagist.org/packages/hubspot/api-client)

PHP [HubSpot API](https://developers.hubspot.com/docs/api/overview) v3 SDK(Client) files

## Installation

```bash
composer require hubspot/api-client
```

## Requirements

The current package requirements are:

PHP >= 7.3

### Sample apps

Please, take a look at our [Sample apps](https://github.com/HubSpot/sample-apps-list)

## Quickstart

### To instantiate API Client using access token use Factory

```php
$hubspot = \HubSpot\Factory::createWithAccessToken('access-token');
```

You'll need to create a [private app](https://developers.hubspot.com/docs/api/private-apps) to get your access token or you can obtain [OAuth2](https://developers.hubspot.com/docs/api/working-with-oauth) access token.

#### To instantiate API Client using developer apikey use Factory

```php
$hubspot = \HubSpot\Factory::createWithDeveloperApiKey('developer-apikey');
```

#### also you can pass custom client to Factory

```php
$client = new \GuzzleHttp\Client([...]);

$hubspot = \HubSpot\Factory::createWithAccessToken('access-token', $client);
```

#### To change the base path

```php
$config = new \GuzzleHttp\Config();
$config->setBasePath('*');
$config->setAccessToken('*');
$config->setDeveloperApiKey('*');

$hubspot = \HubSpot\Factory::create(null, $config);
```

#### API Client comes with Middleware for implementation of Rate and Concurrent Limiting

It provides an ability to turn on retry for failed requests with statuses 429 or 500. Please note that Apps using OAuth are only subject to a limit of 100 requests every 10 seconds.

```php
$handlerStack = \GuzzleHttp\HandlerStack::create();
$handlerStack->push(
    \HubSpot\RetryMiddlewareFactory::createRateLimitMiddleware(
        \HubSpot\Delay::getConstantDelayFunction()
    )
);
        
$handlerStack->push(
    \HubSpot\RetryMiddlewareFactory::createInternalErrorsMiddleware(
        \HubSpot\Delay::getExponentialDelayFunction(2)
    )
);

$client = new \GuzzleHttp\Client(['handler' => $handlerStack]);

$hubspot = \HubSpot\Factory::createWithAccessToken('access-token', $client);
```

#### Get contacts page

```php
$response = $hubspot->crm()->contacts()->basicApi()->getPage();
```

#### Search for a contact

```php
$filter = new \HubSpot\Client\Crm\Contacts\Model\Filter();
$filter
    ->setOperator('EQ')
    ->setPropertyName('email')
    ->setValue($search);

$filterGroup = new \HubSpot\Client\Crm\Contacts\Model\FilterGroup();
$filterGroup->setFilters([$filter]);

$searchRequest = new \HubSpot\Client\Crm\Contacts\Model\PublicObjectSearchRequest();
$searchRequest->setFilterGroups([$filterGroup]);

// Get specific properties
$searchRequest->setProperties(['firstname', 'lastname', 'date_of_birth', 'email']);

// @var CollectionResponseWithTotalSimplePublicObject $contactsPage
$contactsPage = $hubspot->crm()->contacts()->searchApi()->doSearch($searchRequest);
```

#### Create a contact

```php
$contactInput = new \HubSpot\Client\Crm\Contacts\Model\SimplePublicObjectInput();
$contactInput->setProperties([
    'email' => 'example@example.com'
]);

$contact = $hubspot->crm()->contacts()->basicApi()->create($contactInput);
```

#### Update a contact

```php
$newProperties = new \HubSpot\Client\Crm\Contacts\Model\SimplePublicObjectInput();
$newProperties->setProperties([
    'email' => 'updatedExample@example.com'
]);

$hubspot->crm()->contacts()->basicApi()->update($contactId, $newProperties);
```

#### Archive a contact

```php
$hubspot->crm()->contacts()->basicApi()->archive($contactId);
```

#### Get custom objects page

```php
$hubspot->crm()->objects()->basicApi()->getPage(HubSpot\Crm\ObjectType::CONTACTS)
```

#### File uploading

```php
$file = new \SplFileObject('file path');
$response = $hubspot->files()->filesApi()->upload($file, null, '/', null, null, json_encode([
    'access' => 'PRIVATE',
    'ttl' => 'P2W',
    'overwrite' => false,
    'duplicateValidationStrategy' => 'NONE',
    'duplicateValidationScope' => 'EXACT_FOLDER'
]) );
```

#### Not wrapped endpoint(s)

It is possible to access the hubspot request method directly, it could be handy if client doesn't have implementation for some endpoint yet. Exposed request method benefits by having all configured client params.

```php
$response = $hubspot->apiRequest([
    'method' => 'PUT',
    'path' => '/some/api/not/wrapped/yet',
    'body' => ['key' => 'value'],
]);
```

#### apiRequest options

```php
[
    'method' => string, // Http method (e.g.: GET, POST, etc). Default value GET
    'path' => string, // URL path (e.g.: '/crm/v3/objects/contacts'). Optional
    'headers' => array, // Http headers. Optional.
    'body' => mixed, // Request body (if defaultJson set body will be transforted to json string).Optional.
    'authType' => enum(none, accessToken, hapikey, developerApiKey), // Auth type. if it isn't set it will use accessToken or hapikey. Default value is non empty auth type.
    'baseUrl' => string, // Base URL. Default value 'https://api.hubapi.com'.
    'qs' => array, // Query parameters. Optional.
    'defaultJson' => bool, // Default Json. if it is set to true it add to headers [ 'Content-Type' => 'application/json', 'Accept' => 'application/json, */*;q=0.8',]
    // and transfort body to json string. Default value true
];
```

#### get contacts

```php
$response = $hubspot->apiRequest([
    'path' => '/crm/v3/objects/contacts',
]);
```

## Contributing

### Run spec tests

```bash
vendor/bin/phpspec run
```

### Run unit tests

```bash
vendor/bin/phpunit ./tests
```
