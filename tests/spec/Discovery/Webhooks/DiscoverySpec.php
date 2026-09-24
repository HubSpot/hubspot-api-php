<?php

namespace spec\HubSpot\Discovery\Webhooks;

use GuzzleHttp\Client;
use HubSpot\Client\Webhooks\Api\BasicApi;
use HubSpot\Client\Webhooks\Api\BatchApi;
use HubSpot\Config;
use HubSpot\Discovery\Webhooks\Discovery;
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
