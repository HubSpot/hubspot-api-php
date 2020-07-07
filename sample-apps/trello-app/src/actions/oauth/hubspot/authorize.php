<?php

use Helpers\OAuth2Helper;
use HubSpot\Utils\OAuth2;

$authUrl = OAuth2::getAuthUrl(
    OAuth2Helper::getClientId(),
    OAuth2Helper::getRedirectUri(),
    OAuth2Helper::getScope()
);

header('Location: '.$authUrl);
