<?php

namespace spec\HubSpot\Discovery\Crm\Lists;

use GuzzleHttp\Client;
use HubSpot\Client\Crm\Lists\Api\ListsApi;
use HubSpot\Client\Crm\Lists\Api\MembershipsApi;
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
        $this->shouldHaveType(\HubSpot\Discovery\Crm\Lists\Discovery::class);
    }

    public function it_creates_clients()
    {
        $this->listsApi()->shouldHaveType(ListsApi::class);
        $this->membershipsApi()->shouldHaveType(MembershipsApi::class);
    }
}
