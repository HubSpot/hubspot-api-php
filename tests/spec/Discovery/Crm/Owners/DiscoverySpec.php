<?php

namespace spec\HubSpot\Discovery\Crm\Owners;

use GuzzleHttp\Client;
use HubSpot\Client\Crm\Owners\Api\OwnersApi;
use HubSpot\Config;
use HubSpot\Discovery\Crm\Owners\Discovery;
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
        $this->ownersApi()->shouldHaveType(OwnersApi::class);
    }
}
