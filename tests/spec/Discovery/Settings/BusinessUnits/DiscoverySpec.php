<?php

namespace spec\HubSpot\Discovery\Settings\BusinessUnits;

use GuzzleHttp\Client;
use HubSpot\Client\Settings\BusinessUnits\Api\BusinessUnitApi;
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
        $this->shouldHaveType(\HubSpot\Discovery\Settings\BusinessUnits\Discovery::class);
    }

    public function it_creates_clients()
    {
        $this->businessUnitApi()->shouldHaveType(BusinessUnitApi::class);
    }
}
