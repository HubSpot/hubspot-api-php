<?php

namespace HubSpot\Discovery\Crm\Products;

use HubSpot\Client\Crm\Products\Api\BasicApi;
use HubSpot\Client\Crm\Products\Api\BatchApi;
use HubSpot\Client\Crm\Products\Api\GDPRApi;
use HubSpot\Client\Crm\Products\Api\PublicObjectApi;
use HubSpot\Client\Crm\Products\Api\SearchApi;
use HubSpot\Client\Crm\Products\Configuration;
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
