<?php

namespace HubSpot\Discovery\Crm\Objects\Taxes;

use HubSpot\Client\Crm\Objects\Taxes\Api\BasicApi;
use HubSpot\Client\Crm\Objects\Taxes\Api\BatchApi;
use HubSpot\Client\Crm\Objects\Taxes\Api\GDPRApi;
use HubSpot\Client\Crm\Objects\Taxes\Api\PublicObjectApi;
use HubSpot\Client\Crm\Objects\Taxes\Api\SearchApi;
use HubSpot\Client\Crm\Objects\Taxes\Configuration;
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
