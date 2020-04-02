<?php

namespace spec\HubSpot\Discovery\Crm\Timeline;

use GuzzleHttp\Client;
use HubSpot\Client\Crm\Timeline\Api\EventsApi;
use HubSpot\Client\Crm\Timeline\Api\TemplatesApi;
use HubSpot\Client\Crm\Timeline\Api\TokensApi;
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
        $this->shouldHaveType(\HubSpot\Discovery\Crm\Timeline\Discovery::class);
    }

    public function it_creates_clients()
    {
        $this->eventsApi()->shouldHaveType(EventsApi::class);
        $this->templatesApi()->shouldHaveType(TemplatesApi::class);
        $this->tokensApi()->shouldHaveType(TokensApi::class);
    }
}
