<?php

namespace spec\HubSpot\Discovery\Cms\SiteSearch;

use GuzzleHttp\Client;
use HubSpot\Client\Cms\SiteSearch\Api\BasicApi;
use HubSpot\Config;
use HubSpot\Discovery\Cms\SiteSearch\Discovery;
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
        $this->basicApi()->shouldHaveType(BasicApi::class);
    }
}
