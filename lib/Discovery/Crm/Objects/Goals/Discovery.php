<?php

namespace HubSpot\Discovery\Crm\Objects\Goals;

use HubSpot\Client\Crm\Objects\Goals\Api\BasicApi;
use HubSpot\Client\Crm\Objects\Goals\Api\BatchApi;
use HubSpot\Client\Crm\Objects\Goals\Api\GDPRApi;
use HubSpot\Client\Crm\Objects\Goals\Api\PublicObjectApi;
use HubSpot\Client\Crm\Objects\Goals\Api\SearchApi;
use HubSpot\Client\Crm\Objects\Goals\Configuration;
use HubSpot\Discovery\DiscoveryBase;

/**
 * @method BasicApi        basicApi()
 * @method BatchApi        batchApi()
 * @method GDPRApi         gdprApi()
 * @method PublicObjectApi publicObjectApi()
 * @method SearchApi       searchApi()
 */
class Discovery extends DiscoveryBase
{
    public function gdprApi()
    {
        $config = $this->config->convertToClientConfig(Configuration::class);

        return new GDPRApi($this->client, $config);
    }
}
