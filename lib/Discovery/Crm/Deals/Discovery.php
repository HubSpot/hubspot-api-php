<?php

namespace HubSpot\Discovery\Crm\Deals;

use HubSpot\Client\Crm\Deals\Api\BasicApi;
use HubSpot\Client\Crm\Deals\Api\BatchApi;
use HubSpot\Client\Crm\Deals\Api\PublicObjectApi;
use HubSpot\Client\Crm\Deals\Api\SearchApi;
use HubSpot\Discovery\Crm\ObjectDiscovery;

/**
 * @method BasicApi        basicApi()
 * @method BatchApi        batchApi()
 * @method PublicObjectApi publicObjectApi()
 * @method SearchApi       searchApi()
 */
class Discovery extends ObjectDiscovery {}
