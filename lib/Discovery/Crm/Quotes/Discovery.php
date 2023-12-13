<?php

namespace HubSpot\Discovery\Crm\Quotes;

use HubSpot\Client\Crm\Quotes\Api\BasicApi;
use HubSpot\Client\Crm\Quotes\Api\BatchApi;
use HubSpot\Client\Crm\Quotes\Api\PublicObjectApi;
use HubSpot\Client\Crm\Quotes\Api\SearchApi;
use HubSpot\Discovery\Crm\ObjectDiscovery;

/**
 * @method BasicApi        basicApi()
 * @method BatchApi        batchApi()
 * @method SearchApi       searchApi()
 * @method PublicObjectApi publicObjectApi()
 */
class Discovery extends ObjectDiscovery {}
