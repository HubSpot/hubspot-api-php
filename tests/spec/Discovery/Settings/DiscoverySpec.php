<?php

namespace spec\HubSpot\Discovery\Settings;

use GuzzleHttp\Client;
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
        $this->shouldHaveType(\HubSpot\Discovery\Settings\Discovery::class);
    }

    public function it_creates_clients()
    {
        $this->users()->shouldHaveType(\HubSpot\Discovery\Settings\Users\Discovery::class);
    }
}
