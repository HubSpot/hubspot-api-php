<?php

namespace spec\HubSpot\Discovery\Cms\Hubdb;

use GuzzleHttp\Client;
use HubSpot\Client\Cms\Hubdb\Api\RowsApi;
use HubSpot\Client\Cms\Hubdb\Api\RowsBatchApi;
use HubSpot\Client\Cms\Hubdb\Api\TablesApi;
use HubSpot\Config;
use HubSpot\Discovery\Cms\Hubdb\Discovery;
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
        $this->rowsApi()->shouldHaveType(RowsApi::class);
        $this->rowsBatchApi()->shouldHaveType(RowsBatchApi::class);
        $this->tablesApi()->shouldHaveType(TablesApi::class);
    }
}
