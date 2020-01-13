<?php

namespace HubSpot\Discovery\OAuth;

use HubSpot\Client\OAuth\Api\AccessTokensApi;
use HubSpot\Client\OAuth\Api\ApplicationAuthorizationsApi;
use HubSpot\Client\OAuth\Api\AuthApi;
use HubSpot\Client\OAuth\Api\BackfillApi;
use HubSpot\Client\OAuth\Api\RefreshTokensApi;
use HubSpot\Client\OAuth\Api\ScopeGroupsApi;
use HubSpot\Client\OAuth\Api\TokensApi;
use HubSpot\Client\OAuth\Api\WhitelistApi;
use HubSpot\Discovery\DiscoveryBase;

/**
 * @method AccessTokensApi              accessTokensApi()
 * @method ApplicationAuthorizationsApi applicationAuthorizationsApi()
 * @method AuthApi                      authApi()
 * @method BackfillApi                  backfillApi()
 * @method RefreshTokensApi             refreshTokensApi()
 * @method ScopeGroupsApi               scopeGroupsApi()
 * @method TokensApi                    tokensApi()
 * @method WhitelistApi                 whitelistApi()
 */
class Discovery extends DiscoveryBase
{
}
