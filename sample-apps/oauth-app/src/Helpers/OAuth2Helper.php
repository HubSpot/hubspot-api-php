<?php

namespace Helpers;

use HubSpot\Client\Auth\OAuth\Model\TokenResponseIF;
use HubSpot\Factory;

class OAuth2Helper
{
    const APP_REQUIRED_SCOPES = ['contacts'];
    const CALLBACK_PATH = '/oauth/callback';
    const SESSION_TOKENS_KEY = 'tokens';

    public static function getClientId(): string
    {
        $clientId = $_ENV['HUBSPOT_CLIENT_ID'];
        if (empty($clientId)) {
            throw new \Exception('Please specify HUBSPOT_CLIENT_ID in .env');
        }

        return $clientId;
    }

    public static function getClientSecret(): string
    {
        $clientSecret = $_ENV['HUBSPOT_CLIENT_SECRET'];
        if (empty($clientSecret)) {
            throw new \Exception('Please specify HUBSPOT_CLIENT_SECRET in .env');
        }

        return $clientSecret;
    }

    public static function getRedirectUri(): string
    {
        return UrlHelper::generateServerUri().static::CALLBACK_PATH;
    }

    public static function getScope(): array
    {
        return static::APP_REQUIRED_SCOPES;
    }

    public static function saveTokenResponse(TokenResponseIF $tokens): void
    {
        $_SESSION[static::SESSION_TOKENS_KEY] = [
            'access_token' => $tokens->getAccessToken(),
            'refresh_token' => $tokens->getRefreshToken(),
            'expires_in' => $tokens->getExpiresIn(),
            'expires_at' => time() + $tokens['expires_in'] * 0.95,
        ];
    }

    public static function isAuthenticated(): bool
    {
        return isset($_SESSION[static::SESSION_TOKENS_KEY]);
    }

    public static function refreshAndGetAccessToken(): string
    {
        if (empty($_SESSION[static::SESSION_TOKENS_KEY])) {
            throw new \Exception('Please authorize via OAuth2');
        }

        $tokens = $_SESSION[static::SESSION_TOKENS_KEY];

        if (time() > $tokens['expires_at']) {
            $tokens = Factory::create()->auth()->oAuth()->defaultApi()->createToken(
                'refresh_token',
                null,
                static::getRedirectUri(),
                static::getClientId(),
                static::getClientSecret(),
                $tokens['refresh_token']
            );
            self::saveTokenResponse($tokens);
        }

        return $tokens['access_token'];
    }
}
