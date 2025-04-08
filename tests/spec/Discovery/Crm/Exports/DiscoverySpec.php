<?php

namespace spec\HubSpot\Discovery\Crm\Exports;

use GuzzleHttp\Client;
use HubSpot\Client\Crm\Exports\Api\PublicExportsApi;
use HubSpot\Config;
use HubSpot\Discovery\Crm\Exports\Discovery;
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
        $this->publicExportsApi()->shouldHaveType(PublicExportsApi::class);
    }
}
