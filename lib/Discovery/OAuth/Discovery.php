<?php

namespace HubSpot\Discovery\OAuth;

use HubSpot\Client\OAuth\Api\AccessTokensApi;
use HubSpot\Client\OAuth\Api\RefreshTokensApi;
use HubSpot\Client\OAuth\Api\TokensApi;
use HubSpot\Discovery\DiscoveryBase;

/**
 * @method AccessTokensApi  accessTokensApi()
 * @method RefreshTokensApi refreshTokensApi()
 * @method TokensApi        tokensApi()
 */
class Discovery extends DiscoveryBase
{
}
