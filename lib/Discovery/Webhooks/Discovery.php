<?php

namespace HubSpot\Discovery\Webhooks;

use HubSpot\Client\Webhooks\Api\SettingsApi;
use HubSpot\Client\Webhooks\Api\SubscriptionsApi;
use HubSpot\Discovery\Crm\ObjectDiscovery;

/**
 * @method SettingsApi      eventsApi()
 * @method SubscriptionsApi templatesApi()
 */
class Discovery extends ObjectDiscovery
{
}
