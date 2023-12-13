<?php

namespace HubSpot\Discovery\Crm\Objects\Tasks;

use HubSpot\Client\Crm\Objects\Tasks\Api\BasicApi;
use HubSpot\Client\Crm\Objects\Tasks\Api\BatchApi;
use HubSpot\Client\Crm\Objects\Tasks\Api\PublicObjectApi;
use HubSpot\Client\Crm\Objects\Tasks\Api\SearchApi;
use HubSpot\Discovery\DiscoveryBase;

/**
 * @method BasicApi        basicApi()
 * @method BatchApi        batchApi()
 * @method PublicObjectApi publicObjectApi()
 * @method SearchApi       searchApi()
 */
class Discovery extends DiscoveryBase {}
