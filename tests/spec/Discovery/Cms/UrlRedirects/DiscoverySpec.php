<?php

namespace spec\HubSpot\Discovery\Cms\UrlRedirects;

use GuzzleHttp\Client;
use HubSpot\Client\Cms\UrlRedirects\Api\RedirectsApi;
use HubSpot\Config;
use HubSpot\Discovery\Cms\UrlRedirects\Discovery;
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
        $this->redirectsApi()->shouldHaveType(RedirectsApi::class);
    }
}
