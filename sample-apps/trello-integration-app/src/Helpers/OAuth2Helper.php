<?php

namespace Helpers;

use HubSpot\Factory;
use Repositories\SettingsRepository;

class OAuth2Helper
{
    const APP_REQUIRED_SCOPES = ['contacts'];
    const CALLBACK_PATH = '/oauth/hubspot/callback';
    const SESSION_TOKENS_KEY = 'tokens';

    public static function getClientId(): string
    {
        return getEnvOrException('HUBSPOT_CLIENT_ID');
    }

    public static function getClientSecret(): string
    {
        return getEnvOrException('HUBSPOT_CLIENT_SECRET');
    }

    public static function getRedirectUri(): string
    {
        return UrlHelper::generateServerUri().static::CALLBACK_PATH;
    }

    public static function getScope(): array
    {
        return static::APP_REQUIRED_SCOPES;
    }

    public static function getExpiresAt(int $expiresIn): int
    {
        return time() + $expiresIn * 0.95;
    }

    public static function isAuthenticated(): bool
    {
        return !empty(SettingsRepository::getSetting(SettingsRepository::HUBSPOT_TOKEN));
    }

    public static function getToken()
    {
        $token = SettingsRepository::getSetting(SettingsRepository::HUBSPOT_TOKEN);

        if (empty($token)) {
            throw new \Exception('Please authorize via OAuth2');
        }

        return (array) json_decode($token);
    }

    public static function refreshAndGetAccessToken(): string
    {
        $token = static::getToken();

        if (time() > $token['expires_at']) {
            $response = Factory::create()->auth()->oAuth()->defaultApi()->createToken(
                'refresh_token',
                null,
                null,
                static::getClientId(),
                static::getClientSecret(),
                $token['refresh_token']
            );

            SettingsRepository::save(
                SettingsRepository::HUBSPOT_TOKEN,
                json_encode([
                    'refresh_token' => $response->getRefreshToken(),
                    'access_token' => $response->getAccessToken(),
                    'expires_in' => $response->getExpiresIn(),
                    'expires_at' => OAuth2Helper::getExpiresAt($response->getExpiresIn()),
                ])
            );

            return $response->getAccessToken();
        }

        return $token['access_token'];
    }

    public static function saveToken(array $token)
    {
        SettingsRepository::save(SettingsRepository::HUBSPOT_TOKEN, json_encode($token));
    }
}
