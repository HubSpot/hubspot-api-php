<?php

namespace HubSpot\Discovery\Crm\Objects\Meetings;

use HubSpot\Client\Crm\Objects\Meetings\Api\BasicApi;
use HubSpot\Client\Crm\Objects\Meetings\Api\BatchApi;
use HubSpot\Client\Crm\Objects\Meetings\Api\PublicObjectApi;
use HubSpot\Client\Crm\Objects\Meetings\Api\SearchApi;
use HubSpot\Discovery\DiscoveryBase;

/**
 * @method BasicApi        basicApi()
 * @method BatchApi        batchApi()
 * @method PublicObjectApi publicObjectApi()
 * @method SearchApi       searchApi()
 */
class Discovery extends DiscoveryBase {}
