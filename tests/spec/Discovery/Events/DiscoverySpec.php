<?php

namespace spec\HubSpot\Discovery\Events;

use GuzzleHttp\Client;
use HubSpot\Client\Events\Api\BasicApi;
use HubSpot\Config;
use HubSpot\Discovery\Events\Discovery;
use HubSpot\Discovery\Events\Send\Discovery as SendDiscovery;
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
        $this->send()->shouldHaveType(SendDiscovery::class);
    }
}
