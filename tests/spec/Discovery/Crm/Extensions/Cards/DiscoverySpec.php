<?php

namespace spec\HubSpot\Discovery\Crm\Extensions\Cards;

use GuzzleHttp\Client;
use HubSpot\Client\Crm\Extensions\Cards\Api\AdvancedApi;
use HubSpot\Client\Crm\Extensions\Cards\Api\BasicApi;
use HubSpot\Config;
use HubSpot\Discovery\Crm\Extensions\Cards\Discovery;
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
        $this->advancedApi()->shouldHaveType(AdvancedApi::class);
    }
}
