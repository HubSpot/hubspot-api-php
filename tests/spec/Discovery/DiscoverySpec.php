<?php

namespace spec\HubSpot\Discovery;

use GuzzleHttp\Client;
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
        $this->shouldHaveType(\HubSpot\Discovery\Discovery::class);
    }

    public function it_creates_clients()
    {
        $this->auth()->shouldHaveType(\HubSpot\Discovery\Auth\Discovery::class);
        $this->automation()->shouldHaveType(\HubSpot\Discovery\Automation\Discovery::class);
        $this->cms()->shouldHaveType(\HubSpot\Discovery\Cms\Discovery::class);
        $this->conversations()->shouldHaveType(\HubSpot\Discovery\Conversations\Discovery::class);
        $this->communicationPreferences()->shouldHaveType(\HubSpot\Discovery\CommunicationPreferences\Discovery::class);
        $this->crm()->shouldHaveType(\HubSpot\Discovery\Crm\Discovery::class);
        $this->events()->shouldHaveType(\HubSpot\Discovery\Events\Discovery::class);
        $this->files()->shouldHaveType(\HubSpot\Discovery\Files\Discovery::class);
        $this->marketing()->shouldHaveType(\HubSpot\Discovery\Marketing\Discovery::class);
        $this->settings()->shouldHaveType(\HubSpot\Discovery\Settings\Discovery::class);
        $this->webhooks()->shouldHaveType(\HubSpot\Discovery\Webhooks\Discovery::class);
    }
}
