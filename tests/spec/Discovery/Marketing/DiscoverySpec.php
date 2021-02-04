<?php

namespace spec\HubSpot\Discovery\Marketing;

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
        $this->shouldHaveType(\HubSpot\Discovery\Marketing\Discovery::class);
    }

    public function it_creates_clients()
    {
        $this->transactional()->shouldHaveType(\HubSpot\Discovery\Marketing\Transactional\Discovery::class);
    }
}
