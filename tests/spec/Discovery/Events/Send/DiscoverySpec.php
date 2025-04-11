<?php

namespace spec\HubSpot\Discovery\Events\Send;

use GuzzleHttp\Client;
use HubSpot\Client\Events\Send\Api\BasicApi;
use HubSpot\Client\Events\Send\Api\BatchApi;
use HubSpot\Config;
use HubSpot\Discovery\Events\Send\Discovery;
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
        $this->basicApi()->shouldHaveType(BasicApi::class);
        $this->batchApi()->shouldHaveType(BatchApi::class);
    }
}
