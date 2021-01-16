<?php

namespace spec\HubSpot\Discovery\Automation\Actions;

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
        $this->shouldHaveType(\HubSpot\Discovery\Automation\Actions\Discovery::class);
    }

    public function it_creates_clients()
    {
        $this->callbacksApi()->shouldHaveType(\HubSpot\Client\Automation\Actions\Api\CallbacksApi::class);
        $this->definitionsApi()->shouldHaveType(\HubSpot\Client\Automation\Actions\Api\DefinitionsApi::class);
        $this->functionsApi()->shouldHaveType(\HubSpot\Client\Automation\Actions\Api\FunctionsApi::class);
        $this->revisionsApi()->shouldHaveType(\HubSpot\Client\Automation\Actions\Api\RevisionsApi::class);
    }
}
