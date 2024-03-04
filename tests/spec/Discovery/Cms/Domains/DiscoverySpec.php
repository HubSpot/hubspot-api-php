<?php

namespace spec\HubSpot\Discovery\Cms\Domains;

use GuzzleHttp\Client;
use HubSpot\Client\Cms\Domains\Api\DomainsApi;
use HubSpot\Config;
use HubSpot\Discovery\Cms\Domains\Discovery;
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
        $this->domainsApi()->shouldHaveType(DomainsApi::class);
    }
}
