<?php

namespace HubSpot\Discovery\Crm\Objects\Emails;

use HubSpot\Client\Crm\Objects\Emails\Api\BasicApi;
use HubSpot\Client\Crm\Objects\Emails\Api\BatchApi;
use HubSpot\Client\Crm\Objects\Emails\Api\GDPRApi;
use HubSpot\Client\Crm\Objects\Emails\Api\PublicObjectApi;
use HubSpot\Client\Crm\Objects\Emails\Api\SearchApi;
use HubSpot\Client\Crm\Objects\Emails\Configuration;
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
