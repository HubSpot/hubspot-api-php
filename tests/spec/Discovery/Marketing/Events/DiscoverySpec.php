<?php

namespace spec\HubSpot\Discovery\Marketing\Events;

use GuzzleHttp\Client;
use HubSpot\Client\Marketing\Events\Api\AttendanceSubscriberStateChangesApi;
use HubSpot\Client\Marketing\Events\Api\BasicApi;
use HubSpot\Client\Marketing\Events\Api\ListAssociationsApi;
use HubSpot\Client\Marketing\Events\Api\ParticipantStateApi;
use HubSpot\Client\Marketing\Events\Api\SettingsApi;
use HubSpot\Client\Marketing\Events\Api\SubscriberStateChangesApi;
use HubSpot\Config;
use HubSpot\Discovery\Marketing\Events\Discovery;
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
        $this->attendanceSubscriberStateChangesApi()->shouldHaveType(AttendanceSubscriberStateChangesApi::class);
        $this->basicApi()->shouldHaveType(BasicApi::class);
        $this->listAssociationsApi()->shouldHaveType(ListAssociationsApi::class);
        $this->participantStateApi()->shouldHaveType(ParticipantStateApi::class);
        $this->settingsApi()->shouldHaveType(SettingsApi::class);
        $this->subscriberStateChangesApi()->shouldHaveType(SubscriberStateChangesApi::class);
    }
}
