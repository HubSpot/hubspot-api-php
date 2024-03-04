<?php

namespace spec\HubSpot\Discovery\Automation;

use GuzzleHttp\Client;
use HubSpot\Config;
use HubSpot\Discovery\Automation\Discovery;
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
        $this->actions()->shouldHaveType(\HubSpot\Discovery\Automation\Actions\Discovery::class);
    }
}
