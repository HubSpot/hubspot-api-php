<?php

namespace spec\HubSpot\Discovery\Cms\Blogs\BlogPosts;

use GuzzleHttp\Client;
use HubSpot\Client\Cms\Blogs\BlogPosts\Api\BlogPostsApi;
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
        $this->shouldHaveType(\HubSpot\Discovery\Cms\Blogs\BlogPosts\Discovery::class);
    }

    public function it_creates_clients()
    {
        $this->blogPostsApi()->shouldHaveType(BlogPostsApi::class);
    }
}
