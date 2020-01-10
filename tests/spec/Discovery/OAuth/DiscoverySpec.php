<?php

namespace spec\HubSpot\Discovery\OAuth;

use GuzzleHttp\Client;
use HubSpot\Client\OAuth\Api\AccessTokensApi;
use HubSpot\Client\OAuth\Api\ApplicationAuthorizationsApi;
use HubSpot\Client\OAuth\Api\AuthApi;
use HubSpot\Client\OAuth\Api\BackfillApi;
use HubSpot\Client\OAuth\Api\ScopeGroupsApi;
use HubSpot\Client\OAuth\Api\TokensApi;
use HubSpot\Client\OAuth\Api\WhitelistApi;
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

    public function it_creates_clients()
    {
        $this->accessTokensApi()->shouldHaveType(AccessTokensApi::class);
        $this->applicationAuthorizationsApi()->shouldHaveType(ApplicationAuthorizationsApi::class);
        $this->authApi()->shouldHaveType(AuthApi::class);
        $this->backfillApi()->shouldHaveType(BackfillApi::class);
        $this->scopeGroupsApi()->shouldHaveType(ScopeGroupsApi::class);
        $this->tokensApi()->shouldHaveType(TokensApi::class);
        $this->whitelistApi()->shouldHaveType(WhitelistApi::class);
    }
}
