<?php

namespace spec\HubSpot\Discovery\Crm\Imports;

use GuzzleHttp\Client;
use HubSpot\Client\Crm\Imports\Api\CoreApi;
use HubSpot\Client\Crm\Imports\Api\PublicImportsApi;
use HubSpot\Config;
use HubSpot\Discovery\Crm\Imports\Discovery;
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
        $this->coreApi()->shouldHaveType(CoreApi::class);
        $this->publicImportsApi()->shouldHaveType(PublicImportsApi::class);
    }
}
