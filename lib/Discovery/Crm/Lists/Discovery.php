<?php

namespace HubSpot\Discovery\Crm\Lists;

use HubSpot\Client\Crm\Lists\Api\IDMappingApi;
use HubSpot\Client\Crm\Lists\Api\JoinOrderApi;
use HubSpot\Client\Crm\Lists\Api\ListManagementApi;
use HubSpot\Client\Crm\Lists\Api\ListsApi;
use HubSpot\Client\Crm\Lists\Api\MembershipsApi;
use HubSpot\Client\Crm\Lists\Configuration;
use HubSpot\Discovery\DiscoveryBase;

/**
 * @method IDMappingApi      idMappingApi()
 * @method JoinOrderApi      joinOrderApi()
 * @method ListManagementApi listManagementApi()
 * @method ListsApi          listsApi()
 * @method MembershipsApi    membershipsApi()
 */
class Discovery extends DiscoveryBase
{
    public function idMappingApi()
    {
        $config = $this->config->convertToClientConfig(Configuration::class);

        return new IDMappingApi($this->client, $config);
    }
}
