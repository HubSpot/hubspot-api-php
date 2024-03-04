<?php

namespace spec\HubSpot\Discovery\Crm\Extensions\Calling;

use GuzzleHttp\Client;
use HubSpot\Client\Crm\Extensions\Calling\Api\RecordingSettingsApi;
use HubSpot\Client\Crm\Extensions\Calling\Api\SettingsApi;
use HubSpot\Config;
use HubSpot\Discovery\Crm\Extensions\Calling\Discovery;
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
        $this->recordingSettingsApi()->shouldHaveType(RecordingSettingsApi::class);
        $this->settingsApi()->shouldHaveType(SettingsApi::class);
    }
}
