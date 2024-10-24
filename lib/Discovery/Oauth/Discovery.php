<?php

namespace HubSpot\Discovery\Oauth;

use HubSpot\Client\Oauth\Api\AccessTokensApi;
use HubSpot\Client\Oauth\Api\RefreshTokensApi;
use HubSpot\Client\Oauth\Api\TokensApi;
use HubSpot\Discovery\DiscoveryBase;

/**
 * @method AccessTokensApi  accessTokensApi()
 * @method RefreshTokensApi refreshTokensApi()
 * @method TokensApi        tokensApi()
 */
class Discovery extends DiscoveryBase {}
