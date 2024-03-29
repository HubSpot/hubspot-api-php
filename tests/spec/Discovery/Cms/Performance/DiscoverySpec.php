<?php

namespace spec\HubSpot\Discovery\Cms\Performance;

use GuzzleHttp\Client;
use HubSpot\Client\Cms\Performance\Api\PublicPerformanceApi;
use HubSpot\Config;
use HubSpot\Discovery\Cms\Performance\Discovery;
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
        $this->publicPerformanceApi()->shouldHaveType(PublicPerformanceApi::class);
    }
}
