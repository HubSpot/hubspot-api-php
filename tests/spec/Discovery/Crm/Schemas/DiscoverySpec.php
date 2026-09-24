<?php

namespace spec\HubSpot\Discovery\Crm\Schemas;

use GuzzleHttp\Client;
use HubSpot\Client\Crm\Schemas\Api\AdvancedApi;
use HubSpot\Client\Crm\Schemas\Api\BasicApi;
use HubSpot\Client\Crm\Schemas\Api\BatchApi;
use HubSpot\Config;
use HubSpot\Discovery\Crm\Schemas\Discovery;
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
        $this->advancedApi()->shouldHaveType(AdvancedApi::class);
        $this->batchApi()->shouldHaveType(BatchApi::class);
    }
}
