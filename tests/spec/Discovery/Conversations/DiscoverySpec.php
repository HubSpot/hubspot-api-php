<?php

namespace spec\HubSpot\Discovery\Conversations;

use GuzzleHttp\Client;
use HubSpot\Config;
use HubSpot\Discovery\Conversations\Discovery;
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
        $this->visitorIdentification()->shouldHaveType(\HubSpot\Discovery\Conversations\VisitorIdentification\Discovery::class);
    }
}
