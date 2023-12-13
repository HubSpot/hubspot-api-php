<?php

namespace HubSpot\Discovery\Crm\Objects\Calls;

use HubSpot\Client\Crm\Objects\Calls\Api\BasicApi;
use HubSpot\Client\Crm\Objects\Calls\Api\BatchApi;
use HubSpot\Client\Crm\Objects\Calls\Api\PublicObjectApi;
use HubSpot\Client\Crm\Objects\Calls\Api\SearchApi;
use HubSpot\Discovery\DiscoveryBase;

/**
 * @method BasicApi        basicApi()
 * @method BatchApi        batchApi()
 * @method PublicObjectApi publicObjectApi()
 * @method SearchApi       searchApi()
 */
class Discovery extends DiscoveryBase {}
