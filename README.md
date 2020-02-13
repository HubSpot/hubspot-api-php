# hubspot-api-php
PHP [HubSpot API](https://developers.hubspot.com/docs-beta/overview) v3  SDK(Client) files and sample apps

Sample Applications can be found in [sample-apps](sample-apps/) folder

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
$response = $hubSpot->crm()->objects()->basicApi()->getPage(HubSpot\Crm\ObjectType::CONTACTS);
```

#### Search for a contact:

```php
$searchRequest = new \HubSpot\Client\Crm\Objects\Model\PublicObjectSearchRequest();
$searchRequest->setFilters([
    [
        'propertyName' => 'firstname',
        'operator' => 'EQ',
        'value' => 'Alice',
    ],
]);
$response = $hubSpot->crm()->objects()->searchApi()->doSearch($searchRequest);
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
