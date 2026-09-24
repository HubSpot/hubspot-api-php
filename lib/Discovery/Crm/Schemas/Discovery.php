<?php

namespace HubSpot\Discovery\Crm\Schemas;

use HubSpot\Client\Crm\Schemas\Api\AdvancedApi;
use HubSpot\Client\Crm\Schemas\Api\BasicApi;
use HubSpot\Client\Crm\Schemas\Api\BatchApi;
use HubSpot\Discovery\DiscoveryBase;

/**
 * @method BasicApi    basicApi()
 * @method AdvancedApi advancedApi()
 * @method BatchApi    batchApi()
 */
class Discovery extends DiscoveryBase {}
