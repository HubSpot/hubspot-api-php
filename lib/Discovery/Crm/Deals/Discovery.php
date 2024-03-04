<?php

namespace HubSpot\Discovery\Crm\Deals;

use HubSpot\Client\Crm\Deals\Api\BasicApi;
use HubSpot\Client\Crm\Deals\Api\BatchApi;
use HubSpot\Client\Crm\Deals\Api\GDPRApi;
use HubSpot\Client\Crm\Deals\Api\PublicObjectApi;
use HubSpot\Client\Crm\Deals\Api\SearchApi;
use HubSpot\Client\Crm\Deals\Configuration;
use HubSpot\Discovery\Crm\ObjectDiscovery;

/**
 * @method BasicApi        basicApi()
 * @method BatchApi        batchApi()
 * @method GDPRApi         gdprApi()
 * @method PublicObjectApi publicObjectApi()
 * @method SearchApi       searchApi()
 */
class Discovery extends ObjectDiscovery
{
    public function gdprApi()
    {
        $config = $this->config->convertToClientConfig(Configuration::class);

        return new GDPRApi($this->client, $config);
    }
}
