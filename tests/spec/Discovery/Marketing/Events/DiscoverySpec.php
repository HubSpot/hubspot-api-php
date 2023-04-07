<?php

namespace spec\HubSpot\Discovery\Marketing\Events;

use GuzzleHttp\Client;
use HubSpot\Client\Marketing\Events\Api\AttendanceSubscriberStateChangesApi;
use HubSpot\Client\Marketing\Events\Api\MarketingEventsExternalApi;
use HubSpot\Client\Marketing\Events\Api\SearchApi;
use HubSpot\Client\Marketing\Events\Api\SettingsExternalApi;
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
        $this->shouldHaveType(\HubSpot\Discovery\Marketing\Events\Discovery::class);
    }

    public function it_creates_clients()
    {
        $this->attendanceSubscriberStateChangesApi()->shouldHaveType(AttendanceSubscriberStateChangesApi::class);
        $this->marketingEventsExternalApi()->shouldHaveType(MarketingEventsExternalApi::class);
        $this->searchApi()->shouldHaveType(SearchApi::class);
        $this->settingsExternalApi()->shouldHaveType(SettingsExternalApi::class);
    }
}
