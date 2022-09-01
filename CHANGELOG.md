# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased](https://github.com/HubSpot/hubspot-api-php/compare/8.3.1...HEAD)

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

 - rename crm()->pipelines()->pipelineStagesApi()->getCrmV3PipelinesObjectTypePipelineIdAudit() => crm()->pipelines()->pipelineStagesApi()->getAudit()
 - rename crm()->pipelines()->pipelinesApi()->getCrmV3PipelinesObjectTypePipelineIdStagesStageIdAudit() => crm()->pipelines()->pipelinesApi()->getAudit()

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
- `crm()->objects()->сalls()` API client
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

## [5.0.0](https://github.com/HubSpot/hubspot-api-php/releases/tag/5.0.0) - 2021-12-15

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

### Breaking changes:

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
