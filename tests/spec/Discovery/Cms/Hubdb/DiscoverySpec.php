<?php

namespace spec\HubSpot\Discovery\Cms\Hubdb;

use GuzzleHttp\Client;
use HubSpot\Client\Cms\Hubdb\Api\DefaultApi;
use HubSpot\Config;
use PhpSpec\ObjectBehavior;

class DiscoverySpec extends ObjectBehavior
{
    public function let(Client $client, Config $config)
    {
        $this->beConstructedWith($client, $config);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(\HubSpot\Discovery\Cms\Hubdb\Discovery::class);
    }

    public function it_creates_clients()
    {
        $this->defaultApi()->shouldHaveType(DefaultApi::class);
    }
}
