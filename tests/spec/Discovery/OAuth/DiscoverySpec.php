<?php

namespace spec\HubSpot\Discovery\OAuth;

use GuzzleHttp\Client;
use HubSpot\Client\OAuth\Api\TokensApi;
use HubSpot\Config;
use HubSpot\Discovery\OAuth\Discovery;
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

    public function it_creates_tokens_client()
    {
        $this->tokensApi()->shouldHaveType(TokensApi::class);
    }
}
