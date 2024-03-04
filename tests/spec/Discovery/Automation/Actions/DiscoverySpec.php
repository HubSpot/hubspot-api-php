<?php

namespace spec\HubSpot\Discovery\Automation\Actions;

use GuzzleHttp\Client;
use HubSpot\Client\Automation\Actions\Api\CallbacksApi;
use HubSpot\Client\Automation\Actions\Api\DefinitionsApi;
use HubSpot\Client\Automation\Actions\Api\FunctionsApi;
use HubSpot\Client\Automation\Actions\Api\RevisionsApi;
use HubSpot\Config;
use HubSpot\Discovery\Automation\Actions\Discovery;
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
        $this->callbacksApi()->shouldHaveType(CallbacksApi::class);
        $this->definitionsApi()->shouldHaveType(DefinitionsApi::class);
        $this->functionsApi()->shouldHaveType(FunctionsApi::class);
        $this->revisionsApi()->shouldHaveType(RevisionsApi::class);
    }
}
