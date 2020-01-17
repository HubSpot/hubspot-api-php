<?php

namespace spec\HubSpot\Discovery\Crm;

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
        $this->shouldHaveType(\HubSpot\Discovery\Crm\Discovery::class);
    }

    public function it_creates_clients()
    {
        $this->contacts()->shouldHaveType(\HubSpot\Discovery\Crm\Contacts\Discovery::class);
        $this->objects()->shouldHaveType(\HubSpot\Discovery\Crm\Objects\Discovery::class);
        $this->owners()->shouldHaveType(\HubSpot\Discovery\Crm\Owners\Discovery::class);
        $this->properties()->shouldHaveType(\HubSpot\Discovery\Crm\Properties\Discovery::class);
    }
}
