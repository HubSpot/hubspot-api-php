<?php

namespace spec\HubSpot\Discovery\Crm\Objects\DealSplits;

use GuzzleHttp\Client;
use HubSpot\Client\Crm\Objects\DealSplits\Api\BatchApi;
use HubSpot\Config;
use HubSpot\Discovery\Crm\Objects\DealSplits\Discovery;
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
        $this->batchApi()->shouldHaveType(BatchApi::class);
    }
}
