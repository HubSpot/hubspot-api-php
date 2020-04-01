<?php

namespace spec\HubSpot\Discovery\Webhooks;

use GuzzleHttp\Client;
use HubSpot\Config;
use PhpSpec\ObjectBehavior;
use HubSpot\Client\Webhooks\Api\SettingsApi;
use HubSpot\Client\Webhooks\Api\SubscriptionsApi;


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
        $this->webhooks()->shouldHaveType(SettingsApi::class);
        $this->webhooks()->shouldHaveType(SubscriptionsApi::class);
    }
}
