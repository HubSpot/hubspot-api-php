<?php

namespace HubSpot\Discovery\Crm\Objects;

use HubSpot\Client\Crm\Objects\Api\AssociationsApi;
use HubSpot\Client\Crm\Objects\Api\BasicApi;
use HubSpot\Client\Crm\Objects\Api\BatchApi;
use HubSpot\Client\Crm\Objects\Api\GDPRApi;
use HubSpot\Client\Crm\Objects\Api\PublicObjectApi;
use HubSpot\Client\Crm\Objects\Api\SearchApi;
use HubSpot\Client\Crm\Objects\Configuration;
use HubSpot\Discovery\DiscoveryBase;

/**
 * @method AssociationsApi               associationsApi()
 * @method BasicApi                      basicApi()
 * @method BatchApi                      batchApi()
 * @method Calls\Discovery               calls()
 * @method Communications\Discovery      communications()
 * @method GDPRApi                       gdprApi()
 * @method Emails\Discovery              emails()
 * @method FeedbackSubmissions\Discovery feedbackSubmissions()
 * @method Goals\Discovery               goals()
 * @method Meetings\Discovery            meetings()
 * @method Notes\Discovery               notes()
 * @method PostalMail\Discovery          postalMail()
 * @method PublicObjectApi               publicObjectApi()
 * @method SearchApi                     searchApi()
 * @method Tasks\Discovery               tasks()
 * @method Taxes\Discovery               taxes()
 */
class Discovery extends DiscoveryBase
{
    public function gdprApi()
    {
        $config = $this->config->convertToClientConfig(Configuration::class);

        return new GDPRApi($this->client, $config);
    }
}
