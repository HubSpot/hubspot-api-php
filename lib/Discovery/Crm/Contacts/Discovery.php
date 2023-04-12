<?php

namespace HubSpot\Discovery\Crm\Contacts;

use HubSpot\Client\Crm\Contacts\Api\BasicApi;
use HubSpot\Client\Crm\Contacts\Api\BatchApi;
use HubSpot\Client\Crm\Contacts\Api\GDPRApi;
use HubSpot\Client\Crm\Contacts\Api\PublicObjectApi;
use HubSpot\Client\Crm\Contacts\Api\SearchApi;
use HubSpot\Client\Crm\Contacts\Configuration;
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
