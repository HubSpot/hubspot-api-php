<?php

namespace HubSpot\Discovery\Cms\Pages;

use HubSpot\Client\Cms\Pages\Api\ABTestsApi;
use HubSpot\Client\Cms\Pages\Api\AdvancedApi;
use HubSpot\Client\Cms\Pages\Api\BasicApi;
use HubSpot\Client\Cms\Pages\Api\BatchApi;
use HubSpot\Client\Cms\Pages\Api\FoldersApi;
use HubSpot\Client\Cms\Pages\Api\LandingPagesApi;
use HubSpot\Client\Cms\Pages\Api\MultiLanguageApi;
use HubSpot\Client\Cms\Pages\Api\WebsitePagesApi;
use HubSpot\Client\Cms\Pages\Configuration;
use HubSpot\Discovery\DiscoveryBase;

/**
 * @method ABTestsApi       abTestsApi()
 * @method AdvancedApi      advancedApi()
 * @method BasicApi         basicApi()
 * @method BatchApi         batchApi()
 * @method FoldersApi       foldersApi()
 * @method LandingPagesApi  landingPagesApi()
 * @method MultiLanguageApi multiLanguageApi()
 * @method WebsitePagesApi  websitePagesApi()
 */
class Discovery extends DiscoveryBase
{
    public function abTestsApi(): ABTestsApi
    {
        $config = $this->config->convertToClientConfig(Configuration::class);

        return new ABTestsApi($this->client, $config);
    }
}
