<?php

use Helpers\OAuth2Helper;
use HubSpot\Client\Auth\OAuth\Model\TokenResponseIF;
use HubSpot\Factory;

// https://developers.hubspot.com/docs-beta/working-with-oauth
$token = Factory::create()->auth()->oAuth()->defaultApi()->createToken(
    'authorization_code',
    $_GET['code'],
    OAuth2Helper::getRedirectUri(),
    OAuth2Helper::getClientId(),
    OAuth2Helper::getClientSecret()
);

if ($token instanceof TokenResponseIF) {
    OAuth2Helper::saveToken(
        [
            'refresh_token' => $token->getRefreshToken(),
            'access_token' => $token->getAccessToken(),
            'expires_in' => $token->getExpiresIn(),
            'expires_at' => OAuth2Helper::getExpiresAt($token->getExpiresIn()),
        ]
    );
}

header('Location: /');
