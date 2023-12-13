# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased](https://github.com/HubSpot/hubspot-api-php/compare/10.3.0...HEAD)

## [10.3.0](https://github.com/HubSpot/hubspot-api-php/releases/tag/10.3.0) - 2023-12-13

## Updated

- Added `cms()->pages()` api client.
- Added `crm()->lists()` api client.
- Added `crm()->objects()->goals()` api client.
- Added `crm()->objects()->taxes()` api client.
- Added `events()->send()` api client.
- Added `settings()->businessUnits()` api client.

## Fixed

- Fix non ascii chars.

## [10.2.0](https://github.com/HubSpot/hubspot-api-php/releases/tag/10.2.0) - 2023-11-23

## Updated

- Added `marketing()->forms()` api client.
- Removed `composer.lock`.

## [10.1.2](https://github.com/HubSpot/hubspot-api-php/releases/tag/10.1.1) - 2023-11-15

## Fixed

- Fix `HubSpot\RetryMiddlewareFactory` class.

## [10.1.1](https://github.com/HubSpot/hubspot-api-php/releases/tag/10.1.1) - 2023-11-15

## Fixed

- Fix `HubSpot\RetryMiddlewareFactory` class.

## [10.1.0](https://github.com/HubSpot/hubspot-api-php/releases/tag/10.1.0) - 2023-07-27

## Removed `hapikey` from

- `automation()->actions()->callbacksApi()` Api.
- `cms()` (all Api clients).
- `communicationPreferences()` (all Api clients).
- `conversations()` (all API clients).
- `crm()` (all Api clients).
- `events()` (all Api clients).
- `files()` (all Api clients).
- `marketing()->events()->settingsExternalApi()` Api.
- `marketing()->transactional()` Api client.

## Updated

- Cnange type from `object` to `string` in `HubSpot\Client\Cms\Hubdb\Model\StandardError::category`.
- Cnange type from `\HubSpot\Client\Crm\Associations\V4\Model\StandardError[]` to `\HubSpot\Client\Crm\Associations\V4\Model\StandardError1[]` in `\HubSpot\Client\Crm\Associations\V4\Model\BatchResponseSimplePublicObjectWithErrors::errors`.
- Cnange type from `\HubSpot\Client\Crm\Companies\Model\ErrorCategory` to `string` in`HubSpot\Client\Crm\Companies\Model\StandardError::category`.
- Cnange type from `\HubSpot\Client\Crm\Contacts\Model\ErrorCategory` to `string` in`HubSpot\Client\Crm\Contacts\Model\StandardError::category`.
- Cnange type from `\HubSpot\Client\Crm\Deals\Model\ErrorCategory` to `string` in`HubSpot\Client\Crm\Deals\Model\StandardError::category`.
- Cnange type from `\HubSpot\Client\Crm\LineItems\Model\ErrorCategory` to `string` in`HubSpot\Client\Crm\LineItems\Model\StandardError::category`.
- Cnange type from `\HubSpot\Client\Crm\Objects\Calls\Model\ErrorCategory` to `string` in`HubSpot\Client\Crm\Objects\Calls\Model\StandardError::category`.
- Cnange type from `\HubSpot\Client\Crm\Objects\Communications\Model\ErrorCategory` to `string` in`HubSpot\Client\Crm\Objects\Communications\Model\StandardError::category`.
- Cnange type from `\HubSpot\Client\Crm\Objects\Emails\Model\ErrorCategory` to `string` in`HubSpot\Client\Crm\Objects\Emails\Model\StandardError::category`.
- Cnange type from `\HubSpot\Client\Crm\Objects\FeedbackSubmissions\Model\ErrorCategory` to `string` in`HubSpot\Client\Crm\Objects\FeedbackSubmissions\Model\StandardError::category`.
- Cnange type from `\HubSpot\Client\Crm\Objects\Meetings\Model\ErrorCategory` to `string` in`HubSpot\Client\Crm\Objects\Meetings\Model\StandardError::category`.
- Cnange type from `\HubSpot\Client\Crm\Objects\Model\ErrorCategory` to `string` in`HubSpot\Client\Crm\Objects\Model\StandardError::category`.
- Cnange type from `\HubSpot\Client\Crm\Objects\Notes\Model\ErrorCategory` to `string` in`HubSpot\Client\Crm\Objects\Notes\Model\StandardError::category`.
- Cnange type from `\HubSpot\Client\Crm\Objects\PostalMail\Model\ErrorCategory` to `string` in`HubSpot\Client\Crm\Objects\PostalMail\Model\StandardError::category`.
- Cnange type from `\HubSpot\Client\Crm\Objects\Tasks\Model\ErrorCategory` to `string` in`HubSpot\Client\Crm\Objects\Tasks\Model\StandardError::category`.
- Cnange type from `\HubSpot\Client\Crm\Products\Model\ErrorCategory` to `string` in`HubSpot\Client\Crm\Products\Model\StandardError::category`.
- Cnange type from `\HubSpot\Client\Crm\Properties\Model\ErrorCategory` to `string` in`HubSpot\Client\Crm\Properties\Model\StandardError::category`.
- Cnange type from `\HubSpot\Client\Crm\Quotes\Model\ErrorCategory` to `string` in`HubSpot\Client\Crm\Quotes\Model\StandardError::category`.
- Cnange type from `\HubSpot\Client\Crm\Tickets\Model\ErrorCategory` to `string` in`HubSpot\Client\Crm\Tickets\Model\StandardError::category`.
- Cnange type from `\HubSpot\Client\Webhooks\Model\ErrorCategory` to `string` in`HubSpot\Client\Webhooks\Model\StandardError::category`.

## [10.0.1](https://github.com/HubSpot/hubspot-api-php/releases/tag/10.0.1) - 2023-07-27

## Fixed

- Fix `HubSpot\Enums\AssociationTypes` Enum.

## [10.0.0](https://github.com/HubSpot/hubspot-api-php/releases/tag/10.0.0) - 2023-06-08

## Updated

- Fix `Utils\OAuth2::getAuthUrl()` (don't add empty scopes or optional scopes to OAuth url).

## [10.0.0-beta.3](https://github.com/HubSpot/hubspot-api-php/releases/tag/10.0.0-beta.3) - 2023-05-11

## Added

- `crm()->objects()->communications()` Api client.
- `crm()->associations()->v4()->basicApi()` Api.
- `Enums\AssociationTypes` Enum.

## Updated

- `crm()->associations()->typesApi()` => `crm()->associations()->schema()->typesApi()`.
- `crm()->associations()->v4()->definitionsApi()` => `crm()->associations()->v4()->schema()->definitionsApi()`.
- Removed deprecated `Webhooks` util.

## [10.0.0-beta.2](https://github.com/HubSpot/hubspot-api-php/releases/tag/10.0.0-beta.2) - 2023-04-27

## Updated

- Add new event types to webhooks.

## [10.0.0-beta](https://github.com/HubSpot/hubspot-api-php/releases/tag/10.0.0-beta) - 2023-04-12

## Updated

- Rename `cms()->hubdb()->rowsBatchApi()->batchCloneDraftTableRows()` => `cms()->hubdb()->rowsBatchApi()->cloneDraftTableRows()`.
- Rename `cms()->hubdb()->rowsBatchApi()->batchCreateDraftTableRows()` => `cms()->hubdb()->rowsBatchApi()->createDraftTableRows()`.
- Rename `cms()->hubdb()->rowsBatchApi()->batchPurgeDraftTableRows()` => `cms()->hubdb()->rowsBatchApi()->purgeDraftTableRows()`.
- Rename `cms()->hubdb()->rowsBatchApi()->batchReadDraftTableRows()` => `cms()->hubdb()->rowsBatchApi()->readDraftTableRows()`.
- Rename `cms()->hubdb()->rowsBatchApi()->batchReadTableRows()` => `cms()->hubdb()->rowsBatchApi()->readTableRows()`.
- Rename `cms()->hubdb()->rowsBatchApi()->batchReplaceDraftTableRows()` => `cms()->hubdb()->rowsBatchApi()->replaceDraftTableRows()`.
- Rename `cms()->hubdb()->rowsBatchApi()->batchUpdateDraftTableRows()` => `cms()->hubdb()->rowsBatchApi()->updateDraftTableRows()`.
- `cms()->hubdb()->tablesApi()->getDraftTableDetailsById($table_id_or_name, $archived = null, $include_foreign_ids = null)` => `cms()->hubdb()->tablesApi()->getDraftTableDetailsById($table_id_or_name, $include_foreign_ids = null, $archived = null)`
- `cms()->hubdb()->tablesApi()->getTableDetails($table_id_or_name, $archived = null, $include_foreign_ids = null)` => `cms()->hubdb()->tablesApi()->getTableDetails($table_id_or_name, $include_foreign_ids = null, $archived = null)`
- `cms()->hubdb()->tablesApi()->updateDraftTable($table_id_or_name, $hub_db_table_v3_request, $archived = null, $include_foreign_ids = null)` => `cms()->hubdb()->tablesApi()->updateDraftTable($table_id_or_name, $hub_db_table_v3_request, $include_foreign_ids = null, $archived = null)`
- Removed `crm()->companies()->associationsApi`.
- Removed `crm()->contacts()->associationsApi`.
- Removed `crm()->deals()->associationsApi`.
- Removed `crm()->line_items()->associationsApi`.
- Removed `crm()->objects()->calls()->associationsApi`.
- Removed `crm()->objects()->emails()->associationsApi`.
- Removed `crm()->objects()->feedbackSubmissions()->associationsApi`.
- Removed `crm()->objects()->meetings()->associationsApi`.
- Removed `crm()->objects()->notes()->associationsApi`.
- Removed `crm()->objects()->postalMail()->associationsApi`.
- Removed `crm()->objects()->tasks()->associationsApi`.
- Removed `crm()->products()->associationsApi`.
- Removed `crm()->quotes()->associationsApi`.
- Removed `crm()->tickets()->associationsApi`.
- `crm()->companies()->basicApi()->create(SimplePublicObjectInput => SimplePublicObjectInputForCreate)`
- `crm()->companies()->batchApi()->create(BatchInputSimplePublicObjectInput => BatchInputSimplePublicObjectInputForCreate)`
- `crm()->contacts()->basicApi()->create(SimplePublicObjectInput => SimplePublicObjectInputForCreate)`
- `crm()->contacts()->batchApi()->create(BatchInputSimplePublicObjectInput => BatchInputSimplePublicObjectInputForCreate)`
- `crm()->deals()->basicApi()->create(SimplePublicObjectInput => SimplePublicObjectInputForCreate)`
- `crm()->deals()->batchApi()->create(BatchInputSimplePublicObjectInput => BatchInputSimplePublicObjectInputForCreate)`
- `crm()->line_items()->basicApi()->create(SimplePublicObjectInput => SimplePublicObjectInputForCreate)`
- `crm()->line_items()->batchApi()->create(BatchInputSimplePublicObjectInput => BatchInputSimplePublicObjectInputForCreate)`
- `crm()->objects()->basicApi()->create(SimplePublicObjectInput => SimplePublicObjectInputForCreate)`
- `crm()->objects()->batchApi()->create(BatchInputSimplePublicObjectInput => BatchInputSimplePublicObjectInputForCreate)`
- `crm()->objects()->calls()->basicApi()->create(SimplePublicObjectInput => SimplePublicObjectInputForCreate)`
- `crm()->objects()->calls()->batchApi()->create(BatchInputSimplePublicObjectInput => BatchInputSimplePublicObjectInputForCreate)`
- `crm()->objects()->emails()->basicApi()->create(SimplePublicObjectInput => SimplePublicObjectInputForCreate)`
- `crm()->objects()->emails()->batchApi()->create(BatchInputSimplePublicObjectInput => BatchInputSimplePublicObjectInputForCreate)`
- `crm()->objects()->feedbackSubmissions()->basicApi()->create(SimplePublicObjectInput => SimplePublicObjectInputForCreate)`
- `crm()->objects()->feedbackSubmissions()->batchApi()->create(BatchInputSimplePublicObjectInput => BatchInputSimplePublicObjectInputForCreate)`
- `crm()->objects()->meetings()->basicApi()->create(SimplePublicObjectInput => SimplePublicObjectInputForCreate)`
- `crm()->objects()->meetings()->batchApi()->create(BatchInputSimplePublicObjectInput => BatchInputSimplePublicObjectInputForCreate)`
- `crm()->objects()->notes()->basicApi()->create(SimplePublicObjectInput => SimplePublicObjectInputForCreate)`
- `crm()->objects()->notes()->batchApi()->create(BatchInputSimplePublicObjectInput => BatchInputSimplePublicObjectInputForCreate)`
- `crm()->objects()->postalMail()->basicApi()->create(SimplePublicObjectInput => SimplePublicObjectInputForCreate)`
- `crm()->objects()->postalMail()->batchApi()->create(BatchInputSimplePublicObjectInput => BatchInputSimplePublicObjectInputForCreate)`
- `crm()->objects()->tasks()->basicApi()->create(SimplePublicObjectInput => SimplePublicObjectInputForCreate)`
- `crm()->objects()->tasks()->batchApi()->create(BatchInputSimplePublicObjectInput => BatchInputSimplePublicObjectInputForCreate)`
- `crm()->objects()->products()->basicApi()->create(SimplePublicObjectInput => SimplePublicObjectInputForCreate)`
- `crm()->objects()->products()->batchApi()->create(BatchInputSimplePublicObjectInput => BatchInputSimplePublicObjectInputForCreate)`
- `crm()->objects()->quotes()->basicApi()->create(SimplePublicObjectInput => SimplePublicObjectInputForCreate)`
- `crm()->objects()->quotes()->batchApi()->create(BatchInputSimplePublicObjectInput => BatchInputSimplePublicObjectInputForCreate)`
- `crm()->objects()->tickets()->basicApi()->create(SimplePublicObjectInput => SimplePublicObjectInputForCreate)`
- `crm()->objects()->tickets()->batchApi()->create(BatchInputSimplePublicObjectInput => BatchInputSimplePublicObjectInputForCreate)`
- `marketing()->events()->marketingEventsExternalApi()->doSearch()` => `marketing()->events()->searchApi()->doSearch()`
- Rename `oauth()->accessTokensApi()->getAccessToken` => `oauth()->accessTokensApi()->get`.
- Rename `oauth()->refreshTokensApi()->archiveRefreshToken` => `oauth()->refreshTokensApi()->archive`.
- Rename `oauth()->refreshTokensApi()->getRefreshToken` => `oauth()->refreshTokensApi()->get`.
- Rename `oauth()->tokensApi()->createToken` => `oauth()->tokensApi()->create`.

## Added

- Added param `properties` to `crm()->properties()->coreApi()->getAll`.
- Added param `properties` to `crm()->properties()->coreApi()->getByName`.
- Added param `highValue` to all Filter's model.

## [9.4.0](https://github.com/HubSpot/hubspot-api-php/releases/tag/9.4.0) - 2023-03-02

### Added

- Update models for `crm()->properties()` API client

## [9.3.0](https://github.com/HubSpot/hubspot-api-php/releases/tag/9.3.0) - 2023-02-20

### Added

- `crm()->associations()->v4` API client

### Fixed

- Fix `auth()->oauth()->refreshTokensApi()->archiveRefreshToken()` method

## [9.2.2](https://github.com/HubSpot/hubspot-api-php/releases/tag/9.2.2) - 2023-01-12

### Fixed

- Fix `crm()->associations()` API client

## [9.2.1](https://github.com/HubSpot/hubspot-api-php/releases/tag/9.2.1) - 2022-12-22

### Fixed

- Added `pipelineAuditsApi` and `pipelineStageAuditsApi` to`crm()->pipelines()` discovery

## [9.2.0](https://github.com/HubSpot/hubspot-api-php/releases/tag/9.2.0) - 2022-12-19

### Added

- `crm()->objects()->postalMail()` API client

## [9.1.0](https://github.com/HubSpot/hubspot-api-php/releases/tag/9.1.0) - 2022-12-06

### Updated

- Added Private App access token to `cms()->domains()`

## [9.0.1](https://github.com/HubSpot/hubspot-api-php/releases/tag/9.0.1) - 2022-12-05

### Fixed

- Fix all association APIs

### Updated

- `crm()->{objects}()->associationApi()->create($contact_id, $to_object_type, $to_object_id, string $association_type => AssociationSpec[] $association_spec)`

## [9.0.0](https://github.com/HubSpot/hubspot-api-php/releases/tag/9.0.0) - 2022-11-21

### Updated

- Regenerate all clients
- Added Private App access token to `crm()->schemas()` , `crm()->imports()` and `crm()->objects()->feedbackSubmissions()`
- Updated `marketing()->events()` API client
- Deprecated `crm()->extensions()->accounting()` API client

## [8.4.1](https://github.com/HubSpot/hubspot-api-php/releases/tag/8.4.1) - 2022-10-17

### Fixed

- Fixed RequestTest namespace

## [8.4.0](https://github.com/HubSpot/hubspot-api-php/releases/tag/8.4.0) - 2022-10-12

### Added

- add `apiRequest` method

## [8.3.1](https://github.com/HubSpot/hubspot-api-php/releases/tag/8.3.1) - 2022-09-01

### Fixed

- adapt OAuth Util for php 8.1

## [8.3.0](https://github.com/HubSpot/hubspot-api-php/releases/tag/8.3.0) - 2022-07-15

### Added

- Signature's Util `HubSpot\Utils\Signature`

### Deprecated

- Webhook's Util `HubSpot\Utils\Webhooks`

## [8.2.1](https://github.com/HubSpot/hubspot-api-php/releases/tag/8.2.1) - 2022-06-10

### Fixed

- `crm()->objects()->feedbackSubmissions()` method names
- `crm()->quotes()->publicObjectApi()`

## [8.2.0](https://github.com/HubSpot/hubspot-api-php/releases/tag/8.2.0) - 2022-06-07

### Added

- `crm()->quotes()->publicObjectApi()`
- added `$id_property` to `update` and `getById` methods of `crm()->contacts()->basicApi()`

## [8.1.2](https://github.com/HubSpot/hubspot-api-php/releases/tag/8.1.2) - 2022-05-12

### Fixed

- `crm()->contacts()->gdprApi()`
- `crm()->objects()->gdprApi()`

## [8.1.1](https://github.com/HubSpot/hubspot-api-php/releases/tag/8.1.1) - 2022-05-12

### Fixed

- add $properties_with_history to `crm->*object's apis*->getAll` methods

## [8.1.0](https://github.com/HubSpot/hubspot-api-php/releases/tag/8.1.0) - 2022-04-14

### Added

- `crm()->companies()->publicObjectApi`
- `crm()->contacts()->publicObjectApi`
- `crm()->deals()->publicObjectApi`
- `crm()->lineItems()->publicObjectApi`
- `crm()->objects()->calls()->publicObjectApi`
- `crm()->objects()->publicObjectApi`
- `crm()->objects()->emails()->publicObjectApi`
- `crm()->objects()->meetings()->publicObjectApi`
- `crm()->objects()->notes()->publicObjectApi`
- `crm()->objects()->tasks()->publicObjectApi`
- `crm()->products()->publicObjectApi`
- `crm()->tickets()->publicObjectApi`
- add field "values" to all CRM objects `Filter`

## [8.0.0](https://github.com/HubSpot/hubspot-api-php/releases/tag/8.0.0) - 2022-04-08

### Added

- add to `cms()->blogs()->authors()->blogAuthorsApi` Language methods
- add to `cms()->blogs()->blogPosts()->blogPostsApi` Language methods
- add to `cms()->blogs()->tags()->blogTagsApi` Language methods

### Update

- rename `crm()->pipelines()->pipelineStagesApi()->getCrmV3PipelinesObjectTypePipelineIdAudit()` => `crm()->pipelines()->pipelineStagesApi()->getAudit()`
- rename `crm()->pipelines()->pipelinesApi()->getCrmV3PipelinesObjectTypePipelineIdStagesStageIdAudit()` => `crm()->pipelines()->pipelinesApi()->getAudit()`

## [7.0.0](https://github.com/HubSpot/hubspot-api-php/releases/tag/7.0.0) - 2022-03-21

### Update

- Rename `crm()->contacts()->gdprApi()->delete()` to `crm()->contacts()->gdprApi()->purge()`
- Rename `crm()->objects()->gdprApi()->delete()` to `crm()->objects()->gdprApi()->purge()`

### Fixed

- TimelineEvents
- Webhooks and Timeline double appId

## [6.0.1](https://github.com/HubSpot/hubspot-api-php/releases/tag/6.0.1) - 2022-03-25

### Fixed

- Fix bugs in all ObjectSerializers

## [6.0.0](https://github.com/HubSpot/hubspot-api-php/releases/tag/6.0.0) - 2022-03-21

### Added

- `cms()->sourceCode()` API client
- `crm()->objects()->calls()` API client
- `crm()->objects()->emails()` API client
- `crm()->objects()->meetings()` API client
- `crm()->objects()->notes()` API client
- `crm()->objects()->tasks()` API client
- `marketing()->events()` API client
- `settings()->users()` API client

### Fixed

- Fix warnings on php 8.1
- Rename `crm()->contacts()->gdprApi()->postCrmV3ObjectsContactsGdprDelete()` to `crm()->contacts()->gdprApi()->delete()`
- Rename `crm()->objects()->gdprApi()->postCrmV3ObjectsContactsGdprDelete()` to `crm()->objects()->gdprApi()->delete()`

## [5.1.1](https://github.com/HubSpot/hubspot-api-php/releases/tag/5.1.1) - 2022-03-10

### Updated

- Regenerate all clients

### Fixed

- Fix Archived params in all clients

## [5.1.0](https://github.com/HubSpot/hubspot-api-php/releases/tag/5.1.0) - 2022-02-17

### Updated

- Regenerate all clients
- Update all dev dependencies

## [5.0.0](https://github.com/HubSpot/hubspot-api-php/releases/tag/5.0.0)- 2021-12-15

### Updated

- Update Guzzle version (^7.3)
- Update Php version (>=7.3)

### Fixed (breaking changes)

- `cms()->blogs()->authors()->authorApi()` => `cms()->blogs()->authors()->blogAuthorsApi()`
- `cms()->blogs()->blogPosts()->blogPostApi()` => `cms()->blogs()->blogPosts()->blogPostsApi()`
- `cms()->blogs()->tags()->tagApi()` => `cms()->blogs()->tags()->blogTagsApi()`

## [4.0.0](https://github.com/HubSpot/hubspot-api-php/releases/tag/4.0.0) - 2021-09-07

### Added

- `crm()->objects()->gdprApi()` API client
- `crm()->contacts()->gdprApi()` API client

### Fixed (breaking changes)

- `oauth()` fully regenerated
- `cms()->auditLogs()->defaultApi()` => `cms()->auditLogs()->auditLogsApi()`
- `cms()->blogs()->authors()->defaultApi()` => `cms()->blogs()->authors()->authorApi()`
- `cms()->blogs()->blogPosts()->defaultApi()` => `cms()->blogs()->blogPosts()->blogPostApi()`
- `cms()->blogs()->tags()->defaultApi()` => `cms()->blogs()->tags()->tagApi()`
- `cms()->performance()->defaultApi()` => `cms()->performance()->publicPerformanceApi()`
- `cms()->siteSearch()->defaultApi()` => `cms()->siteSearch()->publicApi()`
- `crm()->imports()->defaultApi()` => `crm()->imports()->publicImportsApi()`
- `crm()->owners()->defaultApi()` => `crm()->owners()->ownersApi()`
- `crm()->schemas()->defaultApi()` => `crm()->schemas()->publicObjectSchemasApi()` and `crm()->schemas()->coreApi()`
- `marketing()->transactional()->defaultApi()` => `marketing()->transactional()->publicSmtpTokensApi()` and `marketing()->transactional()->singleSendApi()`

## [3.1.0](https://github.com/HubSpot/hubspot-api-php/releases/tag/3.1.0) - 2021-07-22

### Added

- `communicationPreferences()` API client
- `files()` API client

## [3.0.2](https://github.com/HubSpot/hubspot-api-php/releases/tag/3.0.2) - 2021-06-18

### Fixed

- guzzle/psr7 to 1.*

## [3.0.1](https://github.com/HubSpot/hubspot-api-php/releases/tag/3.0.1) - 2021-06-18

### Fixed (breaking changes)

- fix composer json
- rename method "search" => "doSearch" `crm()->objects()->searchApi()` API clients
- regenerate all clients

## [2.8.1](https://github.com/HubSpot/hubspot-api-php/releases/tag/2.8.1) - 2021-02-17

### Fixed

- fix generateToken method in `conversations()->visitorIdentification()` API clients

## [2.8.0](https://github.com/HubSpot/hubspot-api-php/releases/tag/2.8.0) - 2021-02-16

### Added

- `conversations()->visitorIdentification()` API client
- `events()` API client

## [2.7.1](https://github.com/HubSpot/hubspot-api-php/releases/tag/2.7.1) - 2021-02-05

### Fixed

- fix createToken method in `marketing()->transactional()` API clients

## [2.7.0](https://github.com/HubSpot/hubspot-api-php/releases/tag/2.7.0) - 2021-02-05

### Added

- `crm()->extensions()->accounting()` API client
- `crm()->extensions()->calling()` API client
- `crm()->extensions()->videoconferencing` API client
- `crm()->objects()->feedbackSubmissions()` API client
- `marketing()->transactional()` API client

## [2.6.1](https://github.com/HubSpot/hubspot-api-php/releases/tag/2.6.1) - 2021-01-20

### Fixed

- fix batch methods in `cms()->blogs()` API clients

## [2.6.0](https://github.com/HubSpot/hubspot-api-php/releases/tag/2.6.0) - 2021-01-19

### Added

- `automation()->actions()` API client

## [2.5.0](https://github.com/HubSpot/hubspot-api-php/releases/tag/2.5.0) - 2020-12-03

### Added

- Standard Errors

## [2.4.0](https://github.com/HubSpot/hubspot-api-php/releases/tag/2.4.0) - 2020-12-01

### Added

- `cms()->blogs()->authors()` API client
- `cms()->blogs()->blogPosts()` API client
- `cms()->blogs()->tags()` API client

### Updated

- `cms()->hubdb()` API client


## [2.3.0](https://github.com/HubSpot/hubspot-api-php/releases/tag/2.3.0) - 2020-11-18

### Updated

- Update Guzzle version (^6.2 | ^7.0)

## [2.2.0](https://github.com/HubSpot/hubspot-api-php/releases/tag/2.2.0) - 2020-11-09

### Added

- `cms()->hubdb()` API client

### Fixed

- `cms()->schemas()` change urls
- `crm()->timeline()->tokensApi` and `crm()->timeline()->templatesApi` remove OAuth token

## [2.1.0](https://github.com/HubSpot/hubspot-api-php/releases/tag/2.1.0) - 2020-10-07

### Added

- `cms()->objects()` API client
- `cms()->schemas()` API client

## [2.0.0](https://github.com/HubSpot/hubspot-api-php/releases/tag/2.0.0) - 2020-08-25

### Updated (Breaking changes)

- swap method's params in batch read methods

## [1.3.2](https://github.com/HubSpot/hubspot-api-php/releases/tag/1.3.2) - 2020-08-20

### Fixed

- Fixed HubSpot/Configs

## [1.3.1](https://github.com/HubSpot/hubspot-api-php/releases/tag/1.3.1) - 2020-06-25

### Fixed

- Parsing response in cms()->siteSearch()->defaultApi()->getById() method

## [1.3.0](https://github.com/HubSpot/hubspot-api-php/releases/tag/1.3.0) - 2020-06-17

### Added

- `cms()->auditLogs()` API client
- `cms()->domains()` API client
- `cms()->performance()` API client
- `cms()->siteSearch()` API client
- `cms()->urlRedirects()` API client

## [1.2.0](https://github.com/HubSpot/hubspot-api-php/releases/tag/1.2.0) - 2020-06-02

### Update

- Update Webhook's Util (HubSpot\Utils\Webhooks::isHubspotSignatureValid)

## [1.1.0](https://github.com/HubSpot/hubspot-api-php/releases/tag/1.1.0) - 2020-04-30

### Added

- Batch update for Webhook's Subscriptions (webhooks()->subscriptionsApi()->updateBatch($appId, $updateRequest))

## [1.0.0-beta] - 2020-04-21

### Added

- This CHANGELOG.md file.
- Imports API (crm()->imports())

### Breaking changes

- Updated clients method names:
  1. archiveBatch => archive (crm()->associations()->batchApi())
  2. createBatch => create (crm()->associations()->batchApi())
  3. readBatch => read (crm()->associations()->batchApi())
  4. getTypes => getAll (crm()->associations()->typesApi)
  5. archiveAssociation => archive (crm()->companies()->associationsApi(), crm()->contacts()->associationsApi(), crm()->deals()->associationsApi(), crm()->lineItems()->associationsApi(), crm()->products()->associationsApi(), crm()->quotes()->associationsApi(), crm()->tickets()->associationsApi())
  6. createAssociation => create (crm()->companies()->associationsApi(), crm()->contacts()->associationsApi(), crm()->deals()->associationsApi(), crm()->lineItems()->associationsApi(), crm()->products()->associationsApi(), crm()->quotes()->associationsApi(), crm()->tickets()->associationsApi())
  7. getAssociations => getAll (crm()->companies()->associationsApi(), crm()->contacts()->associationsApi(), crm()->deals()->associationsApi(), crm()->lineItems()->associationsApi(), crm()->products()->associationsApi(), crm()->quotes()->associationsApi(), crm()->tickets()->associationsApi())
  8. archiveBatch => archive (crm()->companies()->batchApi(), crm()->contacts()->batchApi(), crm()->deals()->batchApi(), crm()->lineItems()->batchApi(), crm()->products()->batchApi(), crm()->quotes()->batchApi(), crm()->tickets()->batchApi())
  9. createBatch => create (crm()->companies()->batchApi(), crm()->contacts()->batchApi(), crm()->deals()->batchApi(), crm()->lineItems()->batchApi(), crm()->products()->batchApi(), crm()->quotes()->batchApi(), crm()->tickets()->batchApi())
  10. readBatch => read (crm()->companies()->batchApi(), crm()->contacts()->batchApi(), crm()->deals()->batchApi(), crm()->lineItems()->batchApi(), crm()->products()->batchApi(), crm()->quotes()->batchApi(), crm()->tickets()->batchApi())
  11. updateBatch => update (crm()->companies()->batchApi(), crm()->contacts()->batchApi(), crm()->deals()->batchApi(), crm()->lineItems()->batchApi(), crm()->products()->batchApi(), crm()->quotes()->batchApi(), crm()->tickets()->batchApi())
  12. archiveEventTemplate => archive (crm()->timeline()->templatesApi())
  13. createEventTemplate => create (crm()->timeline()->templatesApi())
  14. getAllEventTemplates => getAll (crm()->timeline()->templatesApi())
  15. getEventTemplateById => getById (crm()->timeline()->templatesApi())
  16. updateEventTemplate => update (crm()->timeline()->templatesApi())
  17. archiveEventTemplateToken => archive (crm()->timeline()->tokensApi())
  18. createEventTemplateToken => create (crm()->timeline()->tokensApi())
  19. updateEventTemplateToken => update (crm()->timeline()->tokensApi())
  20. clearSettings => clear (webhooks()->settingsApi())
  21. configureSettings => configure (webhooks()->settingsApi())
  22. getSettings => getAll (webhooks()->settingsApi())
  23. deleteSubscription => archive (webhooks()->subscriptionsApi())
  24. getSubscription => getById (webhooks()->subscriptionsApi())
  25. getSubscriptions => getAll (webhooks()->subscriptionsApi())
  26. updateSubscription => update (webhooks()->subscriptionsApi())

[unreleased]: https://github.com/HubSpot/hubspot-api-php/compare/8.2.1...HEAD
[1.0.0-beta]: https://github.com/HubSpot/hubspot-api-php/releases/tag/v1.0.0-beta
[1.1.0]: https://github.com/HubSpot/hubspot-api-php/releases/tag/1.1.0
[1.2.0]: https://github.com/HubSpot/hubspot-api-php/releases/tag/1.2.0
[1.3.0]: https://github.com/HubSpot/hubspot-api-php/releases/tag/1.3.0
[1.3.1]: https://github.com/HubSpot/hubspot-api-php/releases/tag/1.3.1
[1.3.2]: https://github.com/HubSpot/hubspot-api-php/releases/tag/1.3.2
[2.0.0]: https://github.com/HubSpot/hubspot-api-php/releases/tag/2.0.0
[2.1.0]: https://github.com/HubSpot/hubspot-api-php/releases/tag/2.1.0
[2.2.0]: https://github.com/HubSpot/hubspot-api-php/releases/tag/2.2.0
[2.3.0]: https://github.com/HubSpot/hubspot-api-php/releases/tag/2.3.0
[2.4.0]: https://github.com/HubSpot/hubspot-api-php/releases/tag/2.4.0
[2.5.0]: https://github.com/HubSpot/hubspot-api-php/releases/tag/2.5.0
[2.6.0]: https://github.com/HubSpot/hubspot-api-php/releases/tag/2.6.0
[2.6.1]: https://github.com/HubSpot/hubspot-api-php/releases/tag/2.6.1
[2.7.0]: https://github.com/HubSpot/hubspot-api-php/releases/tag/2.7.0
[2.7.1]: https://github.com/HubSpot/hubspot-api-php/releases/tag/2.7.1
[2.8.0]: https://github.com/HubSpot/hubspot-api-php/releases/tag/2.8.0
[2.8.1]: https://github.com/HubSpot/hubspot-api-php/releases/tag/2.8.1
[3.0.1]: https://github.com/HubSpot/hubspot-api-php/releases/tag/3.0.1
[3.0.2]: https://github.com/HubSpot/hubspot-api-php/releases/tag/3.0.2
[3.1.0]: https://github.com/HubSpot/hubspot-api-php/releases/tag/3.1.0
[4.0.0]: https://github.com/HubSpot/hubspot-api-php/releases/tag/4.0.0
[5.0.0]: https://github.com/HubSpot/hubspot-api-php/releases/tag/5.0.0
[5.1.0]: https://github.com/HubSpot/hubspot-api-php/releases/tag/5.1.0
[5.1.1]: https://github.com/HubSpot/hubspot-api-php/releases/tag/5.1.1
[6.0.0]: https://github.com/HubSpot/hubspot-api-php/releases/tag/6.0.0
[6.0.1]: https://github.com/HubSpot/hubspot-api-php/releases/tag/6.0.1
[7.0.0]: https://github.com/HubSpot/hubspot-api-php/releases/tag/7.0.0
[8.0.0]: https://github.com/HubSpot/hubspot-api-php/releases/tag/8.0.0
[8.1.0]: https://github.com/HubSpot/hubspot-api-php/releases/tag/8.1.0
[8.1.1]: https://github.com/HubSpot/hubspot-api-php/releases/tag/8.1.1
[8.1.2]: https://github.com/HubSpot/hubspot-api-php/releases/tag/8.1.2
[8.2.0]: https://github.com/HubSpot/hubspot-api-php/releases/tag/8.2.0
[8.2.1]: https://github.com/HubSpot/hubspot-api-php/releases/tag/8.2.1
[9.0.0]: https://github.com/HubSpot/hubspot-api-php/releases/tag/9.0.0
[9.0.1]: https://github.com/HubSpot/hubspot-api-php/releases/tag/9.0.1
[9.1.0]: https://github.com/HubSpot/hubspot-api-php/releases/tag/9.1.0
[9.2.0]: https://github.com/HubSpot/hubspot-api-php/releases/tag/9.2.0
[9.2.1]: https://github.com/HubSpot/hubspot-api-php/releases/tag/9.2.1
[9.2.2]: https://github.com/HubSpot/hubspot-api-php/releases/tag/9.2.2
[9.3.0]: https://github.com/HubSpot/hubspot-api-php/releases/tag/9.3.0
[9.4.0]: https://github.com/HubSpot/hubspot-api-php/releases/tag/9.4.0
[10.0.0-beta]: https://github.com/HubSpot/hubspot-api-php/releases/tag/10.0.0-beta
[10.0.0-beta.2]: https://github.com/HubSpot/hubspot-api-php/releases/tag/10.0.0-beta.2
[10.0.0-beta.3]: https://github.com/HubSpot/hubspot-api-php/releases/tag/10.0.0-beta.3
[10.0.0]: https://github.com/HubSpot/hubspot-api-php/releases/tag/10.0.0
[10.0.1]: https://github.com/HubSpot/hubspot-api-php/releases/tag/10.0.1
[10.1.0]: https://github.com/HubSpot/hubspot-api-php/releases/tag/10.1.0
[10.1.1]: https://github.com/HubSpot/hubspot-api-php/releases/tag/10.1.1
[10.1.2]: https://github.com/HubSpot/hubspot-api-php/releases/tag/10.1.2
[10.2.0]: https://github.com/HubSpot/hubspot-api-php/releases/tag/10.2.0
[10.3.0]: https://github.com/HubSpot/hubspot-api-php/releases/tag/10.3.0
