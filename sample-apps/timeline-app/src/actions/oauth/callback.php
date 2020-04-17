<?php

use Helpers\OAuth2Helper;
use HubSpot\Client\Auth\OAuth\Model\TokenResponseIF;
use HubSpot\Factory;
use Repositories\TokensRepository;

// https://developers.hubspot.com/docs-beta/working-with-oauth
$token = Factory::create()->auth()->oAuth()->defaultApi()->createToken(
    'authorization_code',
    $_GET['code'],
    OAuth2Helper::getRedirectUri(),
    OAuth2Helper::getClientId(),
    OAuth2Helper::getClientSecret()
);

if ($token instanceof TokenResponseIF) {
    TokensRepository::save($token);
}

header('Location: /');
