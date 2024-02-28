<?php

namespace HubSpot\Discovery\Crm\Objects\Meetings;

use HubSpot\Client\Crm\Objects\Meetings\Api\BasicApi;
use HubSpot\Client\Crm\Objects\Meetings\Api\BatchApi;
use HubSpot\Client\Crm\Objects\Meetings\Api\GDPRApi;
use HubSpot\Client\Crm\Objects\Meetings\Api\PublicObjectApi;
use HubSpot\Client\Crm\Objects\Meetings\Api\SearchApi;
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
