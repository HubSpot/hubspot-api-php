<?php

namespace spec\HubSpot\Discovery\Crm\Associations\Schema;

use GuzzleHttp\Client;
use HubSpot\Client\Crm\Associations\Schema\Api\TypesApi;
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
        $this->shouldHaveType(\HubSpot\Discovery\Crm\Associations\Schema\Discovery::class);
    }

    public function it_creates_clients()
    {
        $this->typesApi()->shouldHaveType(TypesApi::class);
    }
}
