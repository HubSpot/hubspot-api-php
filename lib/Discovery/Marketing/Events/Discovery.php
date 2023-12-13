<?php

namespace HubSpot\Discovery\Marketing\Events;

use HubSpot\Client\Marketing\Events\Api\AttendanceSubscriberStateChangesApi;
use HubSpot\Client\Marketing\Events\Api\MarketingEventsExternalApi;
use HubSpot\Client\Marketing\Events\Api\SearchApi;
use HubSpot\Client\Marketing\Events\Api\SettingsExternalApi;
use HubSpot\Discovery\DiscoveryBase;

/**
 * @method AttendanceSubscriberStateChangesApi attendanceSubscriberStateChangesApi()
 * @method MarketingEventsExternalApi          marketingEventsExternalApi()
 * @method SearchApi                           searchApi()
 * @method SettingsExternalApi                 settingsExternalApi()
 */
class Discovery extends DiscoveryBase {}
