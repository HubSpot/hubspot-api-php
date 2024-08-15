# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased](https://github.com/HubSpot/hubspot-api-php/compare/11.3.0...HEAD)

## [11.3.0](https://github.com/HubSpot/hubspot-api-php/releases/tag/11.3.0) - 2024-08-15

- Added lead's association types to `Enums\AssociationTypes` Enum.

## [11.2.0](https://github.com/HubSpot/hubspot-api-php/releases/tag/11.2.0) - 2024-08-13

- Added `crm()->objects()->leads()` api client.

## [11.1.0](https://github.com/HubSpot/hubspot-api-php/releases/tag/11.1.0) - 2024-04-18

### CRM Lists Beta

- Cnanged type of `list_id`, `app_id`, `email_id` and `business_unit_id` from `int` to `string`  in whole client.
- Added method `getLists()` to `crm()->lists()->membershipsApi()`.
- Changed the return type from `CollectionResponseLong|Error` to `ApiCollectionResponseJoinTimeAndRecordId|Error` of `getPage()` method of `crm()->lists()->membershipsApi()`.
- Changed type from `int` to `string` in `HubSpot\Client\Crm\Lists\Model\PublicObjectList:updated_by_id` and `HubSpot\Client\Crm\Lists\Model\PublicObjectList:created_by_id`.

## [11.0.0](https://github.com/HubSpot/hubspot-api-php/releases/tag/11.0.0) - 2024-03-06

### Major change for SDK

- ***Update Php version >=7.4***

### Automation Action client

- Changed type of `$extension_action_definition_input` input param from `ExtensionActionDefinition` to `PublicActionDefinition` in `automation()->actions()->definitionsApi()->create()`.
- Renamed and changed type the third input param of `automation()->actions()->definitionsApi()->update()` from `ExtensionActionDefinitionPatch $extension_action_definition_patch` to `PublicActionDefinition $public_action_definition_patch`.
- Changed the return type from `ExtensionActionDefinition|Error` to `PublicActionDefinition|Error` of `create()`, `getById()` and `update()` methods of `automation()->actions()->definitionsApi()`.
- Changed the return type from `CollectionResponseExtensionActionDefinitionForwardPaging|Error` to `CollectionResponsePublicActionDefinitionForwardPaging|Error` of `getPage()` method of `automation()->actions()->definitionsApi()`.
- Changed the return type from `ActionFunctionIdentifier|Error` to `PublicActionFunctionIdentifier|Error` of `createOrReplaceByFunctionType()` and `createOrReplace()` methods of `automation()->actions()->functionsApi()`.
- Changed the return type from `ActionFunction|Error` to `PublicActionFunction|Error` of `getByFunctionType()` and `getById()` methods of `automation()->actions()->functionsApi()`.
- Changed the return type from `CollectionResponseActionFunctionIdentifierNoPaging|Error` to `CollectionResponsePublicActionFunctionIdentifierNoPaging|Error` of `getPage()` method of `automation()->actions()->functionsApi()`.
- Changed the return type from `ActionRevision|Error` to `PublicActionRevision|Error` of `getById()` method of `automation()->actions()->revisionsApi()`.
- Changed the return type from `CollectionResponseActionRevisionForwardPaging|Error` to `CollectionResponsePublicActionRevisionForwardPaging|Error` of `getPage()` method of `automation()->actions()->revisionsApi()`.
- Added `automation_field_type` param to `HubSpot\Client\Automation\Actions\Model\InputFieldDefinition`.
- Added new params to `HubSpot\Client\Automation\Actions\Model\FieldTypeDefinition`:

```php
  'help_text' => 'string',
  'name' => 'string',
  'description' => 'string',
  'external_options_reference_type' => 'string',
  'label' => 'string',
  'type' => 'string',
  'field_type' => 'string',
  'options_url' => 'string',
  'external_options' => 'bool'
```

### CMS clients

- Changed the order of input params from `$object_id = null, $user_id = null, $after = null, $before = null, $sort = null, $event_type = null, $limit = null, $object_type = null` to `$user_id = null, $event_type = null, $object_type = null, $object_id = null, $after = null, $before = null, $limit = null, $sort = null` in `cms()->auditLogs()->auditLogsApi()->getPage()`.
- Removed params `scope_to_scope_group_pks`, `trial_scopes` and `trial_scope_to_scope_group_pks` from `HubSpot\Client\Auth\OAuth\Model\AccessTokenInfoResponse`.
- Added `prev` param to `HubSpot\Client\Cms\AuditLogs\Model\Paging`.
- Added `property` param to `getById()` and `getPage()` methods of `cms()->blogs()->authors()->blogAuthorsApi()`, `cms()->blogs()->blogPosts()->blogPostsApi()` and `cms()->blogs()->tags()->blogTagsApi()`.
- Change return type from `Error` to `void` of `attachToLangGroup()`, `detachFromLangGroup()` and `updateLangs()` methods of `cms()->blogs()->authors()->blogAuthorsApi()`, `cms()->blogs()->blogPosts()->blogPostsApi()` and `cms()->blogs()->tags()->blogTagsApi()`.
- Removed languages constants from `AttachToLangPrimaryRequestVNext` and `UpdateLanguagesRequestVNext` objects for all CMS blogs clients.
- Changed type from `object` to `string` in `StandardError:category` for all CMS blogs clients.
- Removed background position's constants from `HubSpot\Client\Cms\Blogs\BlogPosts\Model\BackgroundImage`.
- Changed type from `int` to `string` in `HubSpot\Client\Cms\Hubdb\Model\HubDbTableRowV3BatchUpdateRequest:id`.
- Renamed method `get()` to `download()` of `cms()->sourceCode()->contentApi()`.
- Renamed method `replace()` to `createOrUpdate()` of `cms()->sourceCode()->contentApi()`.
- Added param `properties` to `cms()->sourceCode()->metadataApi()->get()`.
- Added param `hash` to `HubSpot\Client\Cms\SourceCode\Model\AssetFileMetadata`.

### CRM Associations and Objects clients

> [!NOTE]
> Please note that CRM Objects includes: companies, contacts, deals, line items, all CRM objects `crm->objects()`, products, quotes and tickets

- Changed type of `$object_id` and `$to_object_id` params from `int` to `string` in `crm()->associations()->v4()->basicApi()->archive()`.
- Changed type of `$object_id` and `$to_object_id` params from `int` to `string` in `crm()->associations()->v4()->basicApi()->create()`.
- Changed type of `$from_object_id` and `$to_object_id` params from `int` to `string` in `crm()->associations()->v4()->basicApi()->createDefault()`.
- Changed type of `$object_id` param from `int` to `string` in `crm()->associations()->v4()->basicApi()->getPage()`.
- Changed type from `StandardError1[]` to `StandardError[]` in `HubSpot\Client\Crm\Associations\v4\Model\BatchResponsePublicDefaultAssociation:errors`.
- Changed type of `to_object_id` and `from_object_id` params from `int` to `string` in `HubSpot\Client\Crm\Associations\v4\Model\LabelsBetweenObjectPair`.
- Changed type from `int` to `string` in `HubSpot\Client\Crm\Associations\v4\Model\MultiAssociatedObjectWithLabel:to_object_id`.
- Changed type from `ErrorCategory` to `string` in `HubSpot\Client\Crm\Associations\v4\Model\StandardError:category`.
- Renamed method `delete()` to `archive()` of `crm()->associations()->v4()->schema()->definitionsApi()`.
- Added param `inverseLabel` to `HubSpot\Client\Crm\Associations\v4\Model\PublicAssociationDefinitionCreateRequest` and `HubSpot\Client\Crm\Associations\v4\Model\PublicAssociationDefinitionUpdateRequest`.
- Changed type from `ErrorCategory` to `string` in `HubSpot\Client\Crm\Associations\Model\StandardError:category`.
- Changed type from `int` to `string` in `PublicObjectSearchRequest:after` in all CRM objects clients.
- Added param `id_property` to `SimplePublicObjectBatchInput` in all CRM objects clients.
- Removed `crm()->objects()->associationsApi()`.
- Renamed param from `$postal_mail` to `$postal_mail_id` in `archive()`, `getById()` and `update()` of `crm()->objects()->postalMail()->basicApi()`.

### Added APIs to CRM Objects clients

- `crm()->companies()->gdprApi()` API.
- `crm()->deals()->gdprApi()` API.
- `crm()->line_items()->gdprApi()` API.
- `crm()->objects()->calls()->gdprApi()` API.
- `crm()->objects()->communications()->gdprApi()` API.
- `crm()->objects()->emails()->gdprApi()` API.
- `crm()->objects()->feedbackSubmissions()->gdprApi()` API.
- `crm()->objects()->meetings()->gdprApi()` API.
- `crm()->objects()->notes()->gdprApi()` API.
- `crm()->objects()->postalMail.gdprApi()` API.
- `crm()->objects()->tasks()->gdprApi()` API.
- `crm()->products()->gdprApi()` API.
- `crm()->quotes()->gdprApi()` API.
- `crm()->tickets()->gdprApi()` API.

### The other CRM clients

- Changed the order of input params from `$app_id, $card_id` to `$card_id, $app_id` in `crm()->extensions()->cards()->cardsApi()->archive()`.
- Changed the return type from `CardResponse|Error` to `PublicCardResponse|Error` of `create()`, `getById()` and `update()` methods of `crm()->extensions()->cards()->cardsApi()`.
- Changed the return type from `CardListResponse|Error` to `PublicCardListResponse|Error` of `getAll()` method of `crm()->extensions()->cards()->cardsApi()`.
- Changed the order of input params from `$app_id, $card_id` to `$card_id, $app_id` in `crm()->extensions()->cards()->cardsApi()->getById()`.
- Changed the order of input params from `$app_id, $card_id, $card_patch_request` to `$card_id, $app_id, $card_patch_request` in `crm()->extensions()->cards()->cardsApi()->update()`.
- Added `serverless_function` and `card_type` params to `HubSpot\Client\Crm\Extensions\Cards\Model\CardFetchBody` and `HubSpot\Client\Crm\Extensions\Cards\Model\CardFetchBodyPatch`.
- Added `NAME_MARKETING_EVENTS` const to `HubSpot\Client\Crm\Extensions\Cards\Model\CardObjectTypeBody`.
- Added `audit_history` param to `HubSpot\Client\Crm\Extensions\Cards\Model\PublicCardResponse`.
- Added `fetch_accounts_uri` param to `HubSpot\Client\Crm\Extensions\Videoconferencing\Model\ExternalSettings`.
- Added `import_template` and `import_source` params to `HubSpot\Client\Crm\Imports\Model\PublicImportResponse`.
- Renamed method `delete()` to `remove()` of `crm()->lists()->listsApi()`.
- Renamed method `deleteAll()` to `removeAll()` of `crm()->lists()->listsApi()`.
- Added param `$validate_deal_stage_usages_before_delete` to `crm()->pipelines()->pipelinesApi()->archive()`, `crm()->pipelines()->pipelinesApi()->replace()` and `crm()->pipelines()->pipelinesApi()->update()`.
- Added `write_permissions` param to `HubSpot\Client\Crm\Pipelines\Model\PipelineStage`.
- Added `description` param to `HubSpot\Client\Crm\Schemas\Model\ObjectSchema`, `HubSpot\Client\Crm\Schemas\Model\ObjectSchemaEgg`, `HubSpot\Client\Crm\Schemas\Model\ObjectTypeDefinition` and `HubSpot\Client\Crm\Schemas\Model\ObjectTypeDefinitionPatch`.
- Added `option_sort_strategy`, `show_currency_symbol`, `form_field`, `referenced_object_type`, `text_display_hint`, `searchable_in_global_search` and  `number_display_hint` params to `HubSpot\Client\Crm\Schemas\Model\ObjectTypePropertyCreate`.
- Added `calculation_formula` param to `HubSpot\Client\Crm\Schemas\Model\Property`.
- Changed the return type from `BatchResponseTimelineEventResponse|BatchResponseTimelineEventResponseWithErrors|Error` to `void` of `createBatch()` method of `crm()-timeline()->eventsApi()`.
- Changed type from `ErrorCategory` to `string` in `HubSpot\Client\Crm\Timeline\Model\StandardError:category`.
- Removed `hapikey` from `crm()->extensions()->videoconferencing()` API client.
- Added `crm()->extensions()->calling()->recordingSettingsApi()` API.

### Marketing clients

- Added `marketing()->events()->basicApi()` API.
- Added `marketing()->events()->batchApi()` API.
- Moved method `archive` from `marketing()->events()->marketingEventsExternalApi()` to `marketing()->events()->basicApi()`.
- Moved method `create` from `marketing()->events()->marketingEventsExternalApi()` to `marketing()->events()->basicApi()`.
- Moved method `doCancel` from `marketing()->events()->marketingEventsExternalApi()` to `marketing()->events()->basicApi()`.
- Moved method `getById` from `marketing()->events()->marketingEventsExternalApi()` to `marketing()->events()->basicApi()`.
- Moved method `replace` from `marketing()->events()->marketingEventsExternalApi()` to `marketing()->events()->basicApi()`.
- Moved method `update` from `marketing()->events()->marketingEventsExternalApi()` to `marketing()->events()->basicApi()`.
- Moved and rename method `archiveBatch => archive` from `marketing()->events()->marketingEventsExternalApi()->archiveBatch()` to `marketing()->events()->batchApi()->archive()`.
- Moved method `doUpsert` from `marketing()->events()->marketingEventsExternalApi()` to `marketing()->events()->batchApi()`.
- Moved method `doEmailUpsertById` from `marketing()->events()->marketingEventsExternalApi()` to `marketing()->events()->subscriberStateChanges()`.
- Moved method `doUpsertById` from `marketing()->events()->marketingEventsExternalApi()` to `marketing()->events()->subscriberStateChanges`.
- Renamed `marketing()->events()->settingsExternalApi()` => `marketing()->events()->settingsApi()`.
- Added `is_large_value` param to `HubSpot\Client\Marketing\Events\Model\PropertyValue`.
- Changed type from `ErrorCategory` to `string` in `HubSpot\Client\Marketing\Events\Model\StandardError:category`.
- Changed type from `object` to `HubSpotFormDefinitionAllOfLegalConsentOptions` in `HubSpot\Client\Marketing\Forms\Model\CollectionResponseFormDefinitionBaseForwardPagingResultsInner:legal_consent_options`, `HubSpot\Client\Marketing\Forms\Model\FormDefinitionBase:legal_consent_options`, `HubSpot\Client\Marketing\Forms\Model\FormDefinitionCreateRequestBase:legal_consent_options`, `HubSpot\Client\Marketing\Forms\Model\HubSpotFormDefinition:legal_consent_options` and `HubSpot\Client\Marketing\Forms\Model\HubSpotFormDefinitionCreateRequest:legal_consent_options`.
- Added `lifecycle_stages` param to `HubSpot\Client\Marketing\Forms\Model\HubSpotFormConfiguration`.

### Events, Files and Settings clients

- Changed input params from `$occurred_after = null, $occurred_before = null, $object_type = null, $object_id = null, $event_type = null, $after = null, $before = null, $limit = null, $sort = null` to `$object_type = null, $event_type = null, $occurred_after = null, $occurred_before = null, $object_id = null, $index_table_name = null, $index_specific_metadata = null, $after = null, $before = null, $limit = null, $sort = null, $object_property_propname = null, $property_propname = null, $id = null` in `events()->eventsApi()->getPage()`.
- Added `prev` param to `HubSpot\Client\Events\Model\Paging`.
- Renamed `behavioralEventsTrackingApi` API to `customEventDataApi` in `events()->send()` API client.
- Added method `getMetadata()` to `files()->filesApi()`.
- Added `expires_at` param to `HubSpot\Client\Files\Model\File` and `HubSpot\Client\Files\Model\FileUpdateInput`.
- Changed type from `ErrorCategory` to `string` in `HubSpot\Client\Files\Model\StandardError:category`.
- Added `role_ids`, `send_welcome_email` and `super_admin` params to `HubSpot\Client\Settings\Users\Model\PublicUser`.

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
- Cnange type from `\HubSpot\Client\Crm\Companies\Model\ErrorCategory` to `string` in `HubSpot\Client\Crm\Companies\Model\StandardError::category`.
- Cnange type from `\HubSpot\Client\Crm\Contacts\Model\ErrorCategory` to `string` in `HubSpot\Client\Crm\Contacts\Model\StandardError::category`.
- Cnange type from `\HubSpot\Client\Crm\Deals\Model\ErrorCategory` to `string` in `HubSpot\Client\Crm\Deals\Model\StandardError::category`.
- Cnange type from `\HubSpot\Client\Crm\LineItems\Model\ErrorCategory` to `string` in `HubSpot\Client\Crm\LineItems\Model\StandardError::category`.
- Cnange type from `\HubSpot\Client\Crm\Objects\Calls\Model\ErrorCategory` to `string` in `HubSpot\Client\Crm\Objects\Calls\Model\StandardError::category`.
- Cnange type from `\HubSpot\Client\Crm\Objects\Communications\Model\ErrorCategory` to `string` in `HubSpot\Client\Crm\Objects\Communications\Model\StandardError::category`.
- Cnange type from `\HubSpot\Client\Crm\Objects\Emails\Model\ErrorCategory` to `string` in `HubSpot\Client\Crm\Objects\Emails\Model\StandardError::category`.
- Cnange type from `\HubSpot\Client\Crm\Objects\FeedbackSubmissions\Model\ErrorCategory` to `string` in `HubSpot\Client\Crm\Objects\FeedbackSubmissions\Model\StandardError::category`.
- Cnange type from `\HubSpot\Client\Crm\Objects\Meetings\Model\ErrorCategory` to `string` in `HubSpot\Client\Crm\Objects\Meetings\Model\StandardError::category`.
- Cnange type from `\HubSpot\Client\Crm\Objects\Model\ErrorCategory` to `string` in `HubSpot\Client\Crm\Objects\Model\StandardError::category`.
- Cnange type from `\HubSpot\Client\Crm\Objects\Notes\Model\ErrorCategory` to `string` in `HubSpot\Client\Crm\Objects\Notes\Model\StandardError::category`.
- Cnange type from `\HubSpot\Client\Crm\Objects\PostalMail\Model\ErrorCategory` to `string` in `HubSpot\Client\Crm\Objects\PostalMail\Model\StandardError::category`.
- Cnange type from `\HubSpot\Client\Crm\Objects\Tasks\Model\ErrorCategory` to `string` in `HubSpot\Client\Crm\Objects\Tasks\Model\StandardError::category`.
- Cnange type from `\HubSpot\Client\Crm\Products\Model\ErrorCategory` to `string` in `HubSpot\Client\Crm\Products\Model\StandardError::category`.
- Cnange type from `\HubSpot\Client\Crm\Properties\Model\ErrorCategory` to `string` in `HubSpot\Client\Crm\Properties\Model\StandardError::category`.
- Cnange type from `\HubSpot\Client\Crm\Quotes\Model\ErrorCategory` to `string` in `HubSpot\Client\Crm\Quotes\Model\StandardError::category`.
- Cnange type from `\HubSpot\Client\Crm\Tickets\Model\ErrorCategory` to `string` in `HubSpot\Client\Crm\Tickets\Model\StandardError::category`.
- Cnange type from `\HubSpot\Client\Webhooks\Model\ErrorCategory` to `string` in `HubSpot\Client\Webhooks\Model\StandardError::category`.

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

[Unreleased]: https://github.com/HubSpot/hubspot-api-php/compare/11.3.0...HEAD
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
[11.0.0]: https://github.com/HubSpot/hubspot-api-php/releases/tag/11.0.0
[11.1.0]: https://github.com/HubSpot/hubspot-api-php/releases/tag/11.1.0
[11.2.0]: https://github.com/HubSpot/hubspot-api-php/releases/tag/11.2.0
[11.3.0]: https://github.com/HubSpot/hubspot-api-php/releases/tag/11.3.0
