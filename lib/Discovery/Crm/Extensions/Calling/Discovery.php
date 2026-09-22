<?php

namespace HubSpot\Discovery\Crm\Extensions\Calling;

use HubSpot\Client\Crm\Extensions\Calling\Api\AdvancedApi;
use HubSpot\Client\Crm\Extensions\Calling\Api\BasicApi;
use HubSpot\Client\Crm\Extensions\Calling\Api\BatchApi;
use HubSpot\Discovery\DiscoveryBase;

/**
 * @method BasicApi    basicApi()
 * @method AdvancedApi advancedApi()
 * @method BatchApi    batchApi()
 */
class Discovery extends DiscoveryBase {}
