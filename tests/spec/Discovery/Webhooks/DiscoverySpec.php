<?php

namespace spec\HubSpot\Discovery\Webhooks;

use GuzzleHttp\Client;
use HubSpot\Client\Webhooks\Api\SettingsApi;
use HubSpot\Client\Webhooks\Api\SubscriptionsApi;
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
        $this->shouldHaveType(\HubSpot\Discovery\Webhooks\Discovery::class);
    }

    public function it_creates_clients()
    {
        $this->settingsApi()->shouldHaveType(SettingsApi::class);
        $this->subscriptionsApi()->shouldHaveType(SubscriptionsApi::class);
    }
}
