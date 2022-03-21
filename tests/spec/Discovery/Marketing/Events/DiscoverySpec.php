<?php

namespace spec\HubSpot\Discovery\Marketing\Events;

use GuzzleHttp\Client;
use HubSpot\Client\Marketing\Events\Api\BasicApi;
use HubSpot\Client\Marketing\Events\Api\BatchApi;
use HubSpot\Client\Marketing\Events\Api\SearchApi;
use HubSpot\Client\Marketing\Events\Api\SettingsApi;
use HubSpot\Client\Marketing\Events\Api\SubscriberStateChangesApi;
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
        $this->basicApi()->shouldHaveType(BasicApi::class);
        $this->batchApi()->shouldHaveType(BatchApi::class);
        $this->searchApi()->shouldHaveType(SearchApi::class);
        $this->settingsApi()->shouldHaveType(SettingsApi::class);
        $this->subscriberStateChangesApi()->shouldHaveType(SubscriberStateChangesApi::class);
    }
}
