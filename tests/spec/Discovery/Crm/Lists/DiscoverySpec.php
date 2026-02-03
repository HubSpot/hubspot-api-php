<?php

namespace spec\HubSpot\Discovery\Crm\Lists;

use GuzzleHttp\Client;
use HubSpot\Client\Crm\Lists\Api\IDMappingApi;
use HubSpot\Client\Crm\Lists\Api\JoinOrderApi;
use HubSpot\Client\Crm\Lists\Api\ListManagementApi;
use HubSpot\Client\Crm\Lists\Api\ListsApi;
use HubSpot\Client\Crm\Lists\Api\MembershipsApi;
use HubSpot\Config;
use HubSpot\Discovery\Crm\Lists\Discovery;
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
        $this->idMappingApi()->shouldHaveType(IDMappingApi::class);
        $this->joinOrderApi()->shouldHaveType(JoinOrderApi::class);
        $this->listManagementApi()->shouldHaveType(ListManagementApi::class);
        $this->listsApi()->shouldHaveType(ListsApi::class);
        $this->membershipsApi()->shouldHaveType(MembershipsApi::class);
    }
}
