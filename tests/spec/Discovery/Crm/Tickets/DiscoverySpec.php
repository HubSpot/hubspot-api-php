<?php

namespace spec\HubSpot\Discovery\Crm\Tickets;

use GuzzleHttp\Client;
use HubSpot\Client\Crm\Tickets\Api\BasicApi;
use HubSpot\Client\Crm\Tickets\Api\BatchApi;
use HubSpot\Client\Crm\Tickets\Api\MergeApi;
use HubSpot\Client\Crm\Tickets\Api\SearchApi;
use HubSpot\Config;
use HubSpot\Discovery\Crm\Tickets\Discovery;
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
        $this->mergeApi()->shouldHaveType(MergeApi::class);
        $this->searchApi()->shouldHaveType(SearchApi::class);
    }
}
