<?php

namespace spec\HubSpot\Discovery\Crm\Associations\V4\Schema;

use GuzzleHttp\Client;
use HubSpot\Client\Crm\Associations\V4\Schema\Api\DefinitionsApi;
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
        $this->shouldHaveType(\HubSpot\Discovery\Crm\Associations\V4\Schema\Discovery::class);
    }

    public function it_creates_clients()
    {
        $this->definitionsApi()->shouldHaveType(DefinitionsApi::class);
    }
}
