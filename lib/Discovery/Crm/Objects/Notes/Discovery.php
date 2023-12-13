<?php

namespace HubSpot\Discovery\Crm\Objects\Notes;

use HubSpot\Client\Crm\Objects\Notes\Api\BasicApi;
use HubSpot\Client\Crm\Objects\Notes\Api\BatchApi;
use HubSpot\Client\Crm\Objects\Notes\Api\PublicObjectApi;
use HubSpot\Client\Crm\Objects\Notes\Api\SearchApi;
use HubSpot\Discovery\DiscoveryBase;

/**
 * @method BasicApi        basicApi()
 * @method BatchApi        batchApi()
 * @method PublicObjectApi publicObjectApi()
 * @method SearchApi       searchApi()
 */
class Discovery extends DiscoveryBase {}
