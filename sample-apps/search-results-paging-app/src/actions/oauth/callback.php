<?php

use Helpers\OAuth2Helper;
use HubSpot\Factory;

// https://developers.hubspot.com/docs-beta/working-with-oauth
$tokens = Factory::create()->auth()->oAuth()->defaultApi()->createToken(
    'authorization_code',
    $_GET['code'],
    OAuth2Helper::getRedirectUri(),
    OAuth2Helper::getClientId(),
    OAuth2Helper::getClientSecret()
);

OAuth2Helper::saveTokenResponse($tokens);

header('Location: /');
