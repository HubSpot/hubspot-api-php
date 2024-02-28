<?php

namespace HubSpot\Discovery\Crm\Objects\Notes;

use HubSpot\Client\Crm\Objects\Notes\Api\BasicApi;
use HubSpot\Client\Crm\Objects\Notes\Api\BatchApi;
use HubSpot\Client\Crm\Objects\Notes\Api\GDPRApi;
use HubSpot\Client\Crm\Objects\Notes\Api\PublicObjectApi;
use HubSpot\Client\Crm\Objects\Notes\Api\SearchApi;
use HubSpot\Client\Crm\Objects\Notes\Configuration;
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
