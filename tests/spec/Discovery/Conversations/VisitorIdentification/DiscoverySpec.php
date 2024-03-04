<?php

namespace spec\HubSpot\Discovery\Conversations\VisitorIdentification;

use GuzzleHttp\Client;
use HubSpot\Client\Conversations\VisitorIdentification\Api\GenerateApi;
use HubSpot\Config;
use HubSpot\Discovery\Conversations\VisitorIdentification\Discovery;
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
        $this->generateApi()->shouldHaveType(GenerateApi::class);
    }
}
