<?php

namespace spec\HubSpot\Discovery\Crm\Objects\Taxes;

use GuzzleHttp\Client;
use HubSpot\Client\Crm\Objects\Taxes\Api\BasicApi;
use HubSpot\Client\Crm\Objects\Taxes\Api\BatchApi;
use HubSpot\Client\Crm\Objects\Taxes\Api\GDPRApi;
use HubSpot\Client\Crm\Objects\Taxes\Api\PublicObjectApi;
use HubSpot\Client\Crm\Objects\Taxes\Api\SearchApi;
use HubSpot\Config;
use HubSpot\Discovery\Crm\Objects\Taxes\Discovery;
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
        $this->gdprApi()->shouldHaveType(GDPRApi::class);
        $this->publicObjectApi()->shouldHaveType(PublicObjectApi::class);
        $this->searchApi()->shouldHaveType(SearchApi::class);
    }
}
