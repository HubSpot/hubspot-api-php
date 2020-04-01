<?php

namespace spec\HubSpot\Discovery\Crm\Properties;

use GuzzleHttp\Client;
use HubSpot\Client\Crm\Properties\Api\BatchApi;
use HubSpot\Client\Crm\Properties\Api\CoreApi;
use HubSpot\Client\Crm\Properties\Api\GroupsApi;
use HubSpot\Config;
use HubSpot\Discovery\Crm\Properties\Discovery;
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
        $this->coreApi()->shouldHaveType(CoreApi::class);
        $this->batchApi()->shouldHaveType(BatchApi::class);
        $this->groupsApi()->shouldHaveType(GroupsApi::class);
    }
}
