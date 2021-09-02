<?php

namespace spec\HubSpot\Discovery\Auth\OAuth;

use GuzzleHttp\Client;
use HubSpot\Client\Auth\OAuth\Api\AccessTokensApi;
use HubSpot\Client\Auth\OAuth\Api\RefreshTokensApi;
use HubSpot\Client\Auth\OAuth\Api\TokensApi;
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
        $this->shouldHaveType(\HubSpot\Discovery\Auth\OAuth\Discovery::class);
    }

    public function it_creates_clients()
    {
        $this->accessTokensApi()->shouldHaveType(AccessTokensApi::class);
        $this->refreshTokensApi()->shouldHaveType(RefreshTokensApi::class);
        $this->tokensApi()->shouldHaveType(TokensApi::class);
    }
}
