<?php

namespace spec\HubSpot\Discovery\Auth;

use GuzzleHttp\Client;
use HubSpot\Config;
use HubSpot\Discovery\Auth\Discovery;
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
        $this->oAuth()->shouldHaveType(\HubSpot\Discovery\Auth\OAuth\Discovery::class);
    }
}
