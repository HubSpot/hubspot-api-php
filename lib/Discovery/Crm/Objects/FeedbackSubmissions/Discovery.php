<?php

namespace HubSpot\Discovery\Crm\Objects\FeedbackSubmissions;

use HubSpot\Client\Crm\Objects\FeedbackSubmissions\Api\BasicApi;
use HubSpot\Client\Crm\Objects\FeedbackSubmissions\Api\BatchApi;
use HubSpot\Client\Crm\Objects\FeedbackSubmissions\Api\GDPRApi;
use HubSpot\Client\Crm\Objects\FeedbackSubmissions\Api\PublicObjectApi;
use HubSpot\Client\Crm\Objects\FeedbackSubmissions\Api\SearchApi;
use HubSpot\Client\Crm\Objects\FeedbackSubmissions\Configuration;
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
