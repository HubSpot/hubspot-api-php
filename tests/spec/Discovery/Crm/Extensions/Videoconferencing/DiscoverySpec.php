<?php

namespace spec\HubSpot\Discovery\Crm\Extensions\Videoconferencing;

use GuzzleHttp\Client;
use HubSpot\Client\Crm\Extensions\Videoconferencing\Api\SettingsApi;
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
        $this->shouldHaveType(\HubSpot\Discovery\Crm\Extensions\Videoconferencing\Discovery::class);
    }

    public function it_creates_clients()
    {
        $this->settingsApi()->shouldHaveType(SettingsApi::class);
    }
}
