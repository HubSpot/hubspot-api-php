<?php

namespace spec\HubSpot\Discovery\Crm\Extensions\Cards;

use GuzzleHttp\Client;
use HubSpot\Client\Crm\Extensions\Cards\Api\CardsApi;
use HubSpot\Client\Crm\Extensions\Cards\Api\SampleResponseApi;
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
        $this->shouldHaveType(\HubSpot\Discovery\Crm\Extensions\Cards\Discovery::class);
    }

    public function it_creates_clients()
    {
        $this->cardsApi()->shouldHaveType(CardsApi::class);
        $this->sampleResponseApi()->shouldHaveType(SampleResponseApi::class);
    }
}
