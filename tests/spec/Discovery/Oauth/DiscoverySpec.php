<?php

namespace spec\HubSpot\Discovery\Oauth;

use GuzzleHttp\Client;
use HubSpot\Client\Oauth\Api\AccessTokensApi;
use HubSpot\Client\Oauth\Api\RefreshTokensApi;
use HubSpot\Client\Oauth\Api\TokensApi;
use HubSpot\Config;
use HubSpot\Discovery\Oauth\Discovery;
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
        $this->accessTokensApi()->shouldHaveType(AccessTokensApi::class);
        $this->refreshTokensApi()->shouldHaveType(RefreshTokensApi::class);
        $this->tokensApi()->shouldHaveType(TokensApi::class);
    }
}
