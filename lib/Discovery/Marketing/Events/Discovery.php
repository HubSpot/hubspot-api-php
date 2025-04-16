<?php

namespace HubSpot\Discovery\Marketing\Events;

use HubSpot\Client\Marketing\Events\Api\AddEventAttendeesApi;
use HubSpot\Client\Marketing\Events\Api\BasicApi;
use HubSpot\Client\Marketing\Events\Api\BatchApi;
use HubSpot\Client\Marketing\Events\Api\ChangePropertyApi;
use HubSpot\Client\Marketing\Events\Api\IdentifiersApi;
use HubSpot\Client\Marketing\Events\Api\ListAssociationsApi;
use HubSpot\Client\Marketing\Events\Api\RetrieveParticipantStateApi;
use HubSpot\Client\Marketing\Events\Api\SettingsApi;
use HubSpot\Client\Marketing\Events\Api\SubscriberStateChangesApi;
use HubSpot\Discovery\DiscoveryBase;

/**
 * @method AddEventAttendeesApi        addEventAttendeesApi()
 * @method BasicApi                    basicApi()
 * @method BatchApi                    batchApi()
 * @method ChangePropertyApi           changePropertyApi()
 * @method IdentifiersApi              identifiersApi()
 * @method ListAssociationsApi         listAssociationsApi()
 * @method RetrieveParticipantStateApi retrieveParticipantStateApi()
 * @method SettingsApi                 settingsApi()
 * @method SubscriberStateChangesApi   subscriberStateChangesApi()
 */
class Discovery extends DiscoveryBase {}
