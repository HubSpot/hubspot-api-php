<?php

namespace spec\HubSpot\Discovery\Crm\Objects;

use GuzzleHttp\Client;
use HubSpot\Client\Crm\Objects\Api\BasicApi;
use HubSpot\Config;
use HubSpot\Discovery\Crm\Objects\Discovery;
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

    public function it_creates_basic_client()
    {
        $this->basicApi()->shouldHaveType(BasicApi::class);
    }
}
