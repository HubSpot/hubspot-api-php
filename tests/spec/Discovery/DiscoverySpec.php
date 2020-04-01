<?php

namespace spec\HubSpot\Discovery;

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
        $this->shouldHaveType(\HubSpot\Discovery\Discovery::class);
    }

    public function it_creates_clients()
    {
        $this->crm()->shouldHaveType(\HubSpot\Discovery\Crm\Discovery::class);
        $this->auth()->shouldHaveType(\HubSpot\Discovery\Auth\Discovery::class);
        $this->webhooks()->shouldHaveType(\HubSpot\Discovery\Webhooks\Discovery::class);
    }
}
