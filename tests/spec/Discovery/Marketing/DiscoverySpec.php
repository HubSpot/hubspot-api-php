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
        $this->events()->shouldHaveType(\HubSpot\Discovery\Marketing\Events\Discovery::class);
        $this->forms()->shouldHaveType(\HubSpot\Discovery\Marketing\Forms\Discovery::class);
        $this->transactional()->shouldHaveType(\HubSpot\Discovery\Marketing\Transactional\Discovery::class);
    }
}
