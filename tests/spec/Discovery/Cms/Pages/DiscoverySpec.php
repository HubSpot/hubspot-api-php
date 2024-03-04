<?php

namespace spec\HubSpot\Discovery\Cms\Pages;

use GuzzleHttp\Client;
use HubSpot\Client\Cms\Pages\Api\LandingPagesApi;
use HubSpot\Client\Cms\Pages\Api\SitePagesApi;
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
        $this->landingPagesApi()->shouldHaveType(LandingPagesApi::class);
        $this->sitePagesApi()->shouldHaveType(SitePagesApi::class);
    }
}
