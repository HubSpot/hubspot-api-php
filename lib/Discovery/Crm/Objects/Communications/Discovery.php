<?php

namespace HubSpot\Discovery\Crm\Objects\Communications;

use HubSpot\Client\Crm\Objects\Communications\Api\BasicApi;
use HubSpot\Client\Crm\Objects\Communications\Api\BatchApi;
use HubSpot\Client\Crm\Objects\Communications\Api\GDPRApi;
use HubSpot\Client\Crm\Objects\Communications\Api\PublicObjectApi;
use HubSpot\Client\Crm\Objects\Communications\Api\SearchApi;
use HubSpot\Client\Crm\Objects\Communications\Configuration;
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
