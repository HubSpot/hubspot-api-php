<?php

namespace HubSpot\Discovery\Marketing\Events;

use HubSpot\Client\Marketing\Events\Api\AttendanceSubscriberStateChangesApi;
use HubSpot\Client\Marketing\Events\Api\BasicApi;
use HubSpot\Client\Marketing\Events\Api\ListAssociationsApi;
use HubSpot\Client\Marketing\Events\Api\ParticipantStateApi;
use HubSpot\Client\Marketing\Events\Api\SettingsApi;
use HubSpot\Client\Marketing\Events\Api\SubscriberStateChangesApi;
use HubSpot\Discovery\DiscoveryBase;

/**
 * @method AttendanceSubscriberStateChangesApi attendanceSubscriberStateChangesApi()
 * @method BasicApi                            basicApi()
 * @method ListAssociationsApi                 listAssociationsApi()
 * @method ParticipantStateApi                 participantStateApi()
 * @method SettingsApi                         settingsApi()
 * @method SubscriberStateChangesApi           subscriberStateChangesApi()
 */
class Discovery extends DiscoveryBase {}
