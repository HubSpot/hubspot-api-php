<?php

namespace HubSpot\Discovery\Crm\LineItems;

use HubSpot\Client\Crm\LineItems\Api\AssociationsApi;
use HubSpot\Client\Crm\LineItems\Api\BasicApi;
use HubSpot\Client\Crm\LineItems\Api\BatchApi;
use HubSpot\Client\Crm\LineItems\Api\SearchApi;
use HubSpot\Discovery\Crm\ObjectDiscovery;

/**
 * @method AssociationsApi associationsApi()
 * @method BatchApi        batchApi()
 * @method BasicApi        basicApi()
 * @method SearchApi       searchApi()
 */
class Discovery extends ObjectDiscovery
{
}
