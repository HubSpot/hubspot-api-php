<?php

namespace Helpers;

use HubSpot\Factory;
use Repositories\TokensRepository;

class OAuth2Helper
{
    const APP_REQUIRED_SCOPES = ['contacts', 'timeline'];
    const CALLBACK_PATH = '/oauth/callback';
    const SESSION_TOKENS_KEY = 'tokens';

    public static function getClientId(): string
    {
        return getEnvOrException('HUBSPOT_CLIENT_ID');
    }

    public static function getClientSecret(): string
    {
        return getEnvOrException('HUBSPOT_CLIENT_SECRET');
    }

    public static function getRedirectUri()
    {
        return UrlHelper::generateServerUri().self::CALLBACK_PATH;
    }

    public static function getScope()
    {
        return self::APP_REQUIRED_SCOPES;
    }

    public static function getExpiresAt(int $expiresIn): int
    {
        return time() + $expiresIn * 0.95;
    }

    public static function isAuthenticated(): bool
    {
        return !empty(TokensRepository::getToken());
    }

    public static function refreshAndGetAccessToken()
    {
        $tokens = TokensRepository::getToken();

        if (empty($tokens)) {
            throw new \Exception('Please authorize via OAuth2');
        }
        if (time() > $tokens['expires_at']) {
            $response = Factory::create()->auth()->oAuth()->defaultApi()->createToken(
                'refresh_token',
                null,
                static::getRedirectUri(),
                static::getClientId(),
                static::getClientSecret(),
                $tokens['refresh_token']
            );

            $tokens = TokensRepository::save($response);
        }

        return $tokens['access_token'];
    }
}
