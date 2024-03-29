<?php

namespace spec\HubSpot\Discovery\Marketing\Forms;

use GuzzleHttp\Client;
use HubSpot\Client\Marketing\Forms\Api\FormsApi;
use HubSpot\Config;
use HubSpot\Discovery\Marketing\Forms\Discovery;
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
        $this->formsApi()->shouldHaveType(FormsApi::class);
    }
}
