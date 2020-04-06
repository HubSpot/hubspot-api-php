<?php

namespace Helpers;

use Repositories\TokensRepository;

class OAuth2Helper
{
    const APP_REQUIRED_SCOPES = ['contacts', 'timeline'];
    const CALLBACK_PATH = '/oauth/callback.php';
    const SESSION_TOKENS_KEY = 'tokens';

    public static function getClientId()
    {
        $clientId = $_ENV['HUBSPOT_CLIENT_ID'];
        if (empty($clientId)) {
            throw new \Exception('Please specify HUBSPOT_CLIENT_ID in .env');
        }

        return $clientId;
    }

    public static function getClientSecret()
    {
        $clientSecret = $_ENV['HUBSPOT_CLIENT_SECRET'];
        if (empty($clientSecret)) {
            throw new \Exception('Please specify HUBSPOT_CLIENT_SECRET in .env');
        }

        return $clientSecret;
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
            $tokens = HubspotClientHelper::getOAuth2Resource()->getTokensByRefresh(
                self::getClientId(),
                self::getClientSecret(),
                $tokens['refresh_token']
            )->toArray();
            TokensRepository::save($tokens);
        }

        return $tokens['access_token'];
    }
}
