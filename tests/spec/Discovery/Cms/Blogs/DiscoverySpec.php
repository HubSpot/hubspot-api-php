<?php

namespace spec\HubSpot\Discovery\Cms\Blogs;

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
        $this->shouldHaveType(\HubSpot\Discovery\Cms\Blogs\Discovery::class);
    }

    public function it_creates_clients()
    {
        $this->authors()->shouldHaveType(\HubSpot\Discovery\Cms\Blogs\Authors\Discovery::class);
        $this->blogPosts()->shouldHaveType(\HubSpot\Discovery\Cms\Blogs\BlogPosts\Discovery::class);
        $this->tags()->shouldHaveType(\HubSpot\Discovery\Cms\Blogs\Tags\Discovery::class);
    }
}
