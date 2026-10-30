<?php

namespace spec\HubSpot\Discovery\Oauth\V3;

use GuzzleHttp\Client;
use HubSpot\Client\Oauth\V3\Api\AdvancedApi;
use HubSpot\Config;
use HubSpot\Discovery\Oauth\V3\Discovery;
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
        $this->advancedApi()->shouldHaveType(AdvancedApi::class);
    }
}
