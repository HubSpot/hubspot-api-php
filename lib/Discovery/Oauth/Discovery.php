<?php

namespace HubSpot\Discovery\Oauth;

use HubSpot\Client\Oauth\Api\AccessTokensApi;
use HubSpot\Client\Oauth\Api\RefreshTokensApi;
use HubSpot\Client\Oauth\Api\TokensApi;
use HubSpot\Client\Oauth\Configuration;
use HubSpot\Discovery\DiscoveryBase;

/**
 * @method V3\Discovery v3()
 */
class Discovery extends DiscoveryBase
{
    /**
     * @deprecated use v3()->advancedApi() instead
     */
    public function accessTokensApi(): AccessTokensApi
    {
        return new AccessTokensApi($this->client, $this->config->convertToClientConfig(Configuration::class));
    }

    /**
     * @deprecated use v3()->advancedApi() instead
     */
    public function refreshTokensApi(): RefreshTokensApi
    {
        return new RefreshTokensApi($this->client, $this->config->convertToClientConfig(Configuration::class));
    }

    /**
     * @deprecated use v3()->advancedApi() instead
     */
    public function tokensApi(): TokensApi
    {
        return new TokensApi($this->client, $this->config->convertToClientConfig(Configuration::class));
    }
}
