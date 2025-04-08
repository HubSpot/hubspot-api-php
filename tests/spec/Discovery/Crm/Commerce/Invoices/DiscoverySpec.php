<?php

namespace spec\HubSpot\Discovery\Crm\Commerce\Invoices;

use GuzzleHttp\Client;
use HubSpot\Client\Crm\Commerce\Invoices\Api\BasicApi;
use HubSpot\Client\Crm\Commerce\Invoices\Api\BatchApi;
use HubSpot\Client\Crm\Commerce\Invoices\Api\SearchApi;
use HubSpot\Config;
use HubSpot\Discovery\Crm\Commerce\Invoices\Discovery;
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
        $this->searchApi()->shouldHaveType(SearchApi::class);
    }
}
