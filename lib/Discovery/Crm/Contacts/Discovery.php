<?php

namespace HubSpot\Discovery\Crm\Contacts;

use HubSpot\Client\Crm\Contacts\Api\AssociationsApi;
use HubSpot\Client\Crm\Contacts\Api\BasicApi;
use HubSpot\Client\Crm\Contacts\Api\BatchApi;
use HubSpot\Client\Crm\Contacts\Api\GDPRApi;
use HubSpot\Client\Crm\Contacts\Api\SearchApi;
use HubSpot\Discovery\Crm\ObjectDiscovery;

/**
 * @method AssociationsApi associationsApi()
 * @method BasicApi        basicApi()
 * @method BatchApi        batchApi()
 * @method GDPRApi         gdprApi()
 * @method SearchApi       searchApi()
 */
class Discovery extends ObjectDiscovery
{
    public function gdprApi()
    {
        return new GDPRApi();
    }
}
