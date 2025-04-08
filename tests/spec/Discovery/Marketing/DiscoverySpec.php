<?php

namespace spec\HubSpot\Discovery\Marketing;

use GuzzleHttp\Client;
use HubSpot\Config;
use HubSpot\Discovery\Marketing\Discovery;
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
        $this->emails()->shouldHaveType(\HubSpot\Discovery\Marketing\Emails\Discovery::class);
        $this->events()->shouldHaveType(\HubSpot\Discovery\Marketing\Events\Discovery::class);
        $this->forms()->shouldHaveType(\HubSpot\Discovery\Marketing\Forms\Discovery::class);
        $this->transactional()->shouldHaveType(\HubSpot\Discovery\Marketing\Transactional\Discovery::class);
    }
}
