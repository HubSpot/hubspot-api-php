<?php

namespace spec\HubSpot\Discovery\Crm\Schemas;

use GuzzleHttp\Client;
use HubSpot\Client\Crm\Schemas\Api\CoreApi;
use HubSpot\Client\Crm\Schemas\Api\PublicObjectSchemasApi;
use HubSpot\Config;
use HubSpot\Discovery\Crm\Schemas\Discovery;
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
        $this->publicObjectSchemasApi()->shouldHaveType(PublicObjectSchemasApi::class);
    }
}
