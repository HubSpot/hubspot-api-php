<?php

namespace spec\HubSpot\Discovery\Events;

use GuzzleHttp\Client;
use HubSpot\Client\Events\Api\EventsApi;
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
        $this->shouldHaveType(\HubSpot\Discovery\Events\Discovery::class);
    }

    public function it_creates_clients()
    {
        $this->eventsApi()->shouldHaveType(EventsApi::class);
    }
}
