# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased](https://github.com/HubSpot/hubspot-api-php/compare/3.1.0...HEAD)

## [3.1.0](https://github.com/HubSpot/hubspot-api-php/releases/tag/3.1.0) - 2021-07-22

### Added

- `communicationPreferences()` API client
- `files()` API client

## [3.0.2](https://github.com/HubSpot/hubspot-api-php/releases/tag/3.0.2) - 2021-06-18

### Fixed

- guzzle/psr7 to 1.*

## [3.0.1](https://github.com/HubSpot/hubspot-api-php/releases/tag/3.0.1) - 2021-06-18

### Fixed

- fix composer json

## [3.0.0](https://github.com/HubSpot/hubspot-api-php/releases/tag/3.0.0) - 2021-06-18

### Fixed (breaking changes)

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

[unreleased]: https://github.com/HubSpot/hubspot-api-php/compare/v1.0.0-beta...HEAD
[1.0.0-beta]: https://github.com/HubSpot/hubspot-api-php/releases/tag/v1.0.0-beta
