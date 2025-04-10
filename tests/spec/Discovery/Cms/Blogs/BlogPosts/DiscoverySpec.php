<?php

namespace spec\HubSpot\Discovery\Cms\Blogs\BlogPosts;

use GuzzleHttp\Client;
use HubSpot\Client\Cms\Blogs\BlogPosts\Api\BasicApi;
use HubSpot\Client\Cms\Blogs\BlogPosts\Api\BatchApi;
use HubSpot\Client\Cms\Blogs\BlogPosts\Api\MultiLanguageApi;
use HubSpot\Config;
use HubSpot\Discovery\Cms\Blogs\BlogPosts\Discovery;
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
        $this->basicApi()->shouldHaveType(BasicApi::class);
        $this->batchApi()->shouldHaveType(BatchApi::class);
        $this->multiLanguageApi()->shouldHaveType(MultiLanguageApi::class);
    }
}
