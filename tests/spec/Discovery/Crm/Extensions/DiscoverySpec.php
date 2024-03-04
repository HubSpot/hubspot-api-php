<?php

namespace spec\HubSpot\Discovery\Crm\Extensions;

use GuzzleHttp\Client;
use HubSpot\Config;
use HubSpot\Discovery\Crm\Extensions\Discovery;
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
        $this->calling()->shouldHaveType(\HubSpot\Discovery\Crm\Extensions\Calling\Discovery::class);
        $this->cards()->shouldHaveType(\HubSpot\Discovery\Crm\Extensions\Cards\Discovery::class);
        $this->videoconferencing()->shouldHaveType(\HubSpot\Discovery\Crm\Extensions\Videoconferencing\Discovery::class);
    }
}
