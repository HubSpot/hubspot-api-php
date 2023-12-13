<?php

namespace HubSpot\Discovery\Auth\OAuth;

use HubSpot\Client\Auth\OAuth\Api\AccessTokensApi;
use HubSpot\Client\Auth\OAuth\Api\RefreshTokensApi;
use HubSpot\Client\Auth\OAuth\Api\TokensApi;
use HubSpot\Discovery\DiscoveryBase;

/**
 * @method AccessTokensApi  accessTokensApi()
 * @method RefreshTokensApi refreshTokensApi()
 * @method TokensApi        tokensApi()
 */
class Discovery extends DiscoveryBase {}
