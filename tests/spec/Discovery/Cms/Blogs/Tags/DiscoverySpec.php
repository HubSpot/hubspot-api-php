<?php

namespace spec\HubSpot\Discovery\Cms\Blogs\Tags;

use GuzzleHttp\Client;
use HubSpot\Client\Cms\Blogs\Tags\Api\DefaultApi;
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
        $this->shouldHaveType(\HubSpot\Discovery\Cms\Blogs\Tags\Discovery::class);
    }

    public function it_creates_clients()
    {
        $this->defaultApi()->shouldHaveType(DefaultApi::class);
    }
}
