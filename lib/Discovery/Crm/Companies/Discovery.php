<?php

namespace HubSpot\Discovery\Crm\Companies;

use HubSpot\Client\Crm\Companies\Api\BasicApi;
use HubSpot\Client\Crm\Companies\Api\BatchApi;
use HubSpot\Client\Crm\Companies\Api\MergeApi;
use HubSpot\Client\Crm\Companies\Api\SearchApi;
use HubSpot\Discovery\Crm\ObjectDiscovery;

/**
 * @method BasicApi     basicApi()
 * @method BatchApi     batchApi()
 * @method MergeApi     mergeApi()
 * @method SearchApi    searchApi()
 */
class Discovery extends ObjectDiscovery {}
