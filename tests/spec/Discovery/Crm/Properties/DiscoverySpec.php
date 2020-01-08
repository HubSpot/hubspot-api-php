<?php

namespace spec\HubSpot\Discovery\Crm\Properties;

use GuzzleHttp\Client;
use HubSpot\Client\Crm\Properties\Api\CoreApi;
use HubSpot\Config;
use HubSpot\Discovery\Crm\Properties\Discovery;
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

    public function it_creates_default_client()
    {
        $this->coreApi()->shouldHaveType(CoreApi::class);
    }
}
