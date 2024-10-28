<?php

namespace HubSpot\Discovery\Crm\Tickets;

use HubSpot\Client\Crm\Tickets\Api\BasicApi;
use HubSpot\Client\Crm\Tickets\Api\BatchApi;
use HubSpot\Client\Crm\Tickets\Api\MergeApi;
use HubSpot\Client\Crm\Tickets\Api\SearchApi;
use HubSpot\Discovery\Crm\ObjectDiscovery;

/**
 * @method BasicApi     basicApi()
 * @method BatchApi     batchApi()
 * @method MergeApi     mergeApi()
 * @method SearchApi    searchApi()
 */
class Discovery extends ObjectDiscovery {}
