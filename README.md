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
