<?php

namespace spec\HubSpot\Discovery\Cms\Pages;

use GuzzleHttp\Client;
use HubSpot\Client\Cms\Pages\Api\ABTestsApi;
use HubSpot\Client\Cms\Pages\Api\AdvancedApi;
use HubSpot\Client\Cms\Pages\Api\BasicApi;
use HubSpot\Client\Cms\Pages\Api\BatchApi;
use HubSpot\Client\Cms\Pages\Api\FoldersApi;
use HubSpot\Client\Cms\Pages\Api\LandingPagesApi;
use HubSpot\Client\Cms\Pages\Api\MultiLanguageApi;
use HubSpot\Client\Cms\Pages\Api\WebsitePagesApi;
use HubSpot\Config;
use HubSpot\Discovery\Cms\Pages\Discovery;
use PhpSpec\ObjectBehavior;

class DiscoverySpec extends ObjectBehavior
{
    public function let(Client $client, Config $config)
    {
        $this->beConstructedWith($client, $config);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Discovery::class);
    }

    public function it_creates_clients()
    {
        $this->abTestsApi()->shouldHaveType(ABTestsApi::class);
        $this->advancedApi()->shouldHaveType(AdvancedApi::class);
        $this->basicApi()->shouldHaveType(BasicApi::class);
        $this->batchApi()->shouldHaveType(BatchApi::class);
        $this->foldersApi()->shouldHaveType(FoldersApi::class);
        $this->landingPagesApi()->shouldHaveType(LandingPagesApi::class);
        $this->multiLanguageApi()->shouldHaveType(MultiLanguageApi::class);
        $this->websitePagesApi()->shouldHaveType(WebsitePagesApi::class);
    }
}
