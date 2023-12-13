<?php

namespace HubSpot\Discovery\Crm\Timeline;

use HubSpot\Client\Crm\Timeline\Api\EventsApi;
use HubSpot\Client\Crm\Timeline\Api\TemplatesApi;
use HubSpot\Client\Crm\Timeline\Api\TokensApi;
use HubSpot\Discovery\Crm\ObjectDiscovery;

/**
 * @method EventsApi    eventsApi()
 * @method TemplatesApi templatesApi()
 * @method TokensApi    tokensApi()
 */
class Discovery extends ObjectDiscovery {}
