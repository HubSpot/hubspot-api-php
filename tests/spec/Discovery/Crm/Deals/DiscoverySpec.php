<?php

namespace spec\HubSpot\Discovery\Crm\Deals;

use GuzzleHttp\Client;
use HubSpot\Client\Crm\Deals\Api\BasicApi;
use HubSpot\Client\Crm\Deals\Api\BatchApi;
use HubSpot\Client\Crm\Deals\Api\PublicObjectApi;
use HubSpot\Client\Crm\Deals\Api\SearchApi;
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
        $this->shouldHaveType(\HubSpot\Discovery\Crm\Deals\Discovery::class);
    }

    public function it_creates_clients()
    {
        $this->basicApi()->shouldHaveType(BasicApi::class);
        $this->batchApi()->shouldHaveType(BatchApi::class);
        $this->publicObjectApi()->shouldHaveType(PublicObjectApi::class);
        $this->searchApi()->shouldHaveType(SearchApi::class);
    }
}
