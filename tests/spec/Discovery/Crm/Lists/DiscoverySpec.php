<?php

namespace spec\HubSpot\Discovery\Crm\Lists;

use GuzzleHttp\Client;
use HubSpot\Client\Crm\Lists\Api\FoldersApi;
use HubSpot\Client\Crm\Lists\Api\ListsApi;
use HubSpot\Client\Crm\Lists\Api\MappingApi;
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
        $this->foldersApi()->shouldHaveType(FoldersApi::class);
        $this->listsApi()->shouldHaveType(ListsApi::class);
        $this->mappingApi()->shouldHaveType(MappingApi::class);
        $this->membershipsApi()->shouldHaveType(MembershipsApi::class);
    }
}
