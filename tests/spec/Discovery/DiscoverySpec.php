<?php

namespace spec\HubSpot\Discovery;

use GuzzleHttp\Client;
use HubSpot\Config;
use HubSpot\Discovery\Discovery;
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

    public function it_creates_crm_discovery()
    {
        $this->crm()->shouldHaveType(\HubSpot\Discovery\Crm\Discovery::class);
    }

    public function it_creates_oauth_discovery()
    {
        $this->oAuth()->shouldHaveType(\HubSpot\Discovery\OAuth\Discovery::class);
    }
}
