<?php

namespace HubSpot\Discovery\Crm\Objects\Tasks;

use HubSpot\Client\Crm\Objects\Tasks\Api\BasicApi;
use HubSpot\Client\Crm\Objects\Tasks\Api\BatchApi;
use HubSpot\Client\Crm\Objects\Tasks\Api\GDPRApi;
use HubSpot\Client\Crm\Objects\Tasks\Api\PublicObjectApi;
use HubSpot\Client\Crm\Objects\Tasks\Api\SearchApi;
use HubSpot\Client\Crm\Objects\Tasks\Configuration;
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
