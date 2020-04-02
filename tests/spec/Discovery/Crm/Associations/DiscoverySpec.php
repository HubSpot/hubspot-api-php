<?php

namespace spec\HubSpot\Discovery\Crm\Associations;

use GuzzleHttp\Client;
use HubSpot\Client\Crm\Associations\Api\BatchApi;
use HubSpot\Client\Crm\Associations\Api\TypesApi;
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
        $this->shouldHaveType(\HubSpot\Discovery\Crm\Associations\Discovery::class);
    }

    public function it_creates_clients()
    {
        $this->batchApi()->shouldHaveType(BatchApi::class);
        $this->typesApi()->shouldHaveType(TypesApi::class);
    }
}
