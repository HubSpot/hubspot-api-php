<?php

namespace HubSpot\Discovery\Marketing\Events;

use HubSpot\Client\Marketing\Events\Api\AttendanceSubscriberStateChangesApi;
use HubSpot\Client\Marketing\Events\Api\BasicApi;
use HubSpot\Client\Marketing\Events\Api\BatchApi;
use HubSpot\Client\Marketing\Events\Api\MarketingEventsExternalApi;
use HubSpot\Client\Marketing\Events\Api\SearchApi;
use HubSpot\Client\Marketing\Events\Api\SettingsApi;
use HubSpot\Client\Marketing\Events\Api\SubscriberStateChangesApi;
use HubSpot\Discovery\DiscoveryBase;

/**
 * @method AttendanceSubscriberStateChangesApi attendanceSubscriberStateChangesApi()
 * @method BasicApi                            basicApi()
 * @method BatchApi                            batchApi()
 * @method MarketingEventsExternalApi          marketingEventsExternalApi()
 * @method SearchApi                           searchApi()
 * @method SettingsApi                         settingsApi()
 * @method SubscriberStateChangesApi           subscriberStateChangesApi()
 */
class Discovery extends DiscoveryBase {}
