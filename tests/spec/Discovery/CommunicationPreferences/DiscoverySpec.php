<?php

namespace spec\HubSpot\Discovery\CommunicationPreferences;

use GuzzleHttp\Client;
use HubSpot\Client\CommunicationPreferences\Api\DefinitionApi;
use HubSpot\Client\CommunicationPreferences\Api\StatusApi;
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
        $this->shouldHaveType(\HubSpot\Discovery\CommunicationPreferences\Discovery::class);
    }

    public function it_creates_clients()
    {
        $this->definitionApi()->shouldHaveType(DefinitionApi::class);
        $this->statusApi()->shouldHaveType(StatusApi::class);
    }
}
