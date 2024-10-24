<?php

namespace HubSpot\Discovery\Crm\Lists;

use HubSpot\Client\Crm\Lists\Api\FoldersApi;
use HubSpot\Client\Crm\Lists\Api\ListsApi;
use HubSpot\Client\Crm\Lists\Api\MappingApi;
use HubSpot\Client\Crm\Lists\Api\MembershipsApi;
use HubSpot\Discovery\DiscoveryBase;

/**
 * @method FoldersApi     foldersApi()
 * @method ListsApi       listsApi()
 * @method MappingApi     mappingApi()
 * @method MembershipsApi membershipsApi()
 */
class Discovery extends DiscoveryBase {}
