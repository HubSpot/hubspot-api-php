<?php

namespace HubSpot\Discovery\Marketing\Events;

use HubSpot\Client\Marketing\Events\Api\BasicApi;
use HubSpot\Client\Marketing\Events\Api\BatchApi;
use HubSpot\Client\Marketing\Events\Api\EventAttendeesApi;
use HubSpot\Client\Marketing\Events\Api\EventStatusApi;
use HubSpot\Client\Marketing\Events\Api\IdentifiersApi;
use HubSpot\Client\Marketing\Events\Api\ListAssociationsApi;
use HubSpot\Client\Marketing\Events\Api\ParticipantStateApi;
use HubSpot\Client\Marketing\Events\Api\SettingsApi;
use HubSpot\Client\Marketing\Events\Api\SubscriberStateChangesApi;
use HubSpot\Discovery\DiscoveryBase;

/**
 * @method BasicApi                  basicApi()
 * @method BatchApi                  batchApi()
 * @method EventAttendeesApi         eventAttendeesApi()
 * @method EventStatusApi            eventStatusApi()
 * @method IdentifiersApi            identifiersApi()
 * @method ListAssociationsApi       listAssociationsApi()
 * @method ParticipantStateApi       participantStateApi()
 * @method SettingsApi               settingsApi()
 * @method SubscriberStateChangesApi subscriberStateChangesApi()
 */
class Discovery extends DiscoveryBase {}
