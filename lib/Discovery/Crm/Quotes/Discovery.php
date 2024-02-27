<?php

namespace HubSpot\Discovery\Crm\Quotes;

use HubSpot\Client\Crm\Quotes\Api\BasicApi;
use HubSpot\Client\Crm\Quotes\Api\BatchApi;
use HubSpot\Client\Crm\Quotes\Api\GDPRApi;
use HubSpot\Client\Crm\Quotes\Api\PublicObjectApi;
use HubSpot\Client\Crm\Quotes\Api\SearchApi;
use HubSpot\Client\Crm\Quotes\Configuration;
use HubSpot\Discovery\Crm\ObjectDiscovery;

/**
 * @method BasicApi        basicApi()
 * @method BatchApi        batchApi()
 * @method GDPRApi         gdprApi()
 * @method SearchApi       searchApi()
 * @method PublicObjectApi publicObjectApi()
 */
class Discovery extends ObjectDiscovery
{
    public function gdprApi()
    {
        $config = $this->config->convertToClientConfig(Configuration::class);

        return new GDPRApi($this->client, $config);
    }
}
