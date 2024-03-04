<?php

namespace spec\HubSpot\Discovery\Settings;

use GuzzleHttp\Client;
use HubSpot\Config;
use HubSpot\Discovery\Settings\Discovery;
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
        $this->users()->shouldHaveType(\HubSpot\Discovery\Settings\Users\Discovery::class);
    }
}
