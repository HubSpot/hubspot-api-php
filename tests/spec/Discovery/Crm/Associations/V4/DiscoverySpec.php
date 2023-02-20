<?php

namespace spec\HubSpot\Discovery\Crm\Associations\V4;

use GuzzleHttp\Client;
use HubSpot\Client\Crm\Associations\V4\Api\BatchApi;
use HubSpot\Client\Crm\Associations\V4\Api\DefinitionsApi;
use HubSpot\Discovery\Crm\Associations\V4\Discovery;
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
        $this->shouldHaveType(\HubSpot\Discovery\Crm\Associations\V4\Discovery::class);
    }

    public function it_creates_clients()
    {
        $this->batchApi()->shouldHaveType(BatchApi::class);
        $this->definitionsApi()->shouldHaveType(DefinitionsApi::class);
    }
}
