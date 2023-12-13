<?php

namespace HubSpot\Discovery\Crm\Objects\Communications;

use HubSpot\Client\Crm\Objects\Communications\Api\BasicApi;
use HubSpot\Client\Crm\Objects\Communications\Api\BatchApi;
use HubSpot\Client\Crm\Objects\Communications\Api\PublicObjectApi;
use HubSpot\Client\Crm\Objects\Communications\Api\SearchApi;
use HubSpot\Discovery\DiscoveryBase;

/**
 * @method BasicApi        basicApi()
 * @method BatchApi        batchApi()
 * @method PublicObjectApi publicObjectApi()
 * @method SearchApi       searchApi()
 */
class Discovery extends DiscoveryBase {}
