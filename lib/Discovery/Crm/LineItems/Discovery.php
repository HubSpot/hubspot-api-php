<?php

namespace HubSpot\Discovery\Crm\LineItems;

use HubSpot\Client\Crm\LineItems\Api\BasicApi;
use HubSpot\Client\Crm\LineItems\Api\BatchApi;
use HubSpot\Client\Crm\LineItems\Api\GDPRApi;
use HubSpot\Client\Crm\LineItems\Api\PublicObjectApi;
use HubSpot\Client\Crm\LineItems\Api\SearchApi;
use HubSpot\Client\Crm\LineItems\Configuration;
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
