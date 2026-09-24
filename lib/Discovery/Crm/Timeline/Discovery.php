<?php

namespace HubSpot\Discovery\Crm\Timeline;

use HubSpot\Client\Crm\Timeline\Api\AdvancedApi;
use HubSpot\Client\Crm\Timeline\Api\BasicApi;
use HubSpot\Client\Crm\Timeline\Api\BatchApi;
use HubSpot\Discovery\Crm\ObjectDiscovery;

/**
 * @method BasicApi    basicApi()
 * @method AdvancedApi advancedApi()
 * @method BatchApi    batchApi()
 */
class Discovery extends ObjectDiscovery {}
