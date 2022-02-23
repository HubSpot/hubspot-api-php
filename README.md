# hubspot-api-php
PHP [HubSpot API](https://developers.hubspot.com/docs-beta/overview) v3 SDK(Client) files

## Installation

```bash
composer require hubspot/api-client
```

### Sample apps

Please, take a look at our [Sample apps](https://github.com/HubSpot/sample-apps-list)

## Quickstart

#### To instantiate API Client using HubSpot API Key use Factory:

```php
$hubSpot = \HubSpot\Factory::createWithApiKey('api-key');
```

#### or using OAuth2 access token:

```php
$hubSpot = \HubSpot\Factory::createWithAccessToken('access-token');
```

#### also you can pass custom client to Factory:

```php
$client = new \GuzzleHttp\Client([...]);

$hubSpot = \HubSpot\Factory::createWithAccessToken('access-token', $client);
```

#### API Client comes with Middleware for implementation of Rate and Concurrent Limiting.
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

$hubSpot = \HubSpot\Factory::createWithAccessToken('access-token', $client);
```

#### Get contacts page:

```php
$response = $hubSpot->crm()->contacts()->basicApi()->getPage();
```

#### Search for a contact:

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

// @var CollectionResponseWithTotalSimplePublicObject $contactsPage
$contactsPage = $hubSpot->crm()->contacts()->searchApi()->doSearch($searchRequest);
```

#### Create a contact:

```php
$contactInput = new \HubSpot\Client\Crm\Contacts\Model\SimplePublicObjectInput();
$contactInput->setProperties([
    'email' => 'example@example.com'
]);

$contact = $hubSpot->crm()->contacts()->basicApi()->create($contactInput);
```

#### Update a contact:

```php
$newProperties = new \HubSpot\Client\Crm\Contacts\Model\SimplePublicObjectInput();
$newProperties->setProperties([
    'email' => 'updatedExample@example.com'
]);

$hubSpot->crm()->contacts()->basicApi()->update($contactId, $newProperties);
```

#### Archive a contact:

```php
$hubSpot->crm()->contacts()->basicApi()->archive($contactId);
```

#### Get custom objects page:

```php 
$hubSpot->crm()->objects()->basicApi()->getPage(HubSpot\Crm\ObjectType::CONTACTS)
```

#### File uploading

```php 
$file = new \SplFileObject(“file path”);
$response = $hubSpot->files()->filesApi()->upload($file, null, ‘/’, null, null, json_encode([
    “access” => “PRIVATE”,
    “ttl” => “P2W”,
    “overwrite” => false,
    “duplicateValidationStrategy” => “NONE”,
    “duplicateValidationScope” => “EXACT_FOLDER”
]) );
```

## Contributing

### Run spec tests

```
vendor/bin/phpspec run
```

### Run unit tests

```
vendor/bin/phpunit ./tests
```
