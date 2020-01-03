<?php

use Helpers\HubspotClientHelper;
use Helpers\OAuth2Helper;

$tokens = HubspotClientHelper::createFactory()->oAuth()->tokensApi()->postoauthv1token(
    'authorization_code',
    $_GET['code'],
    OAuth2Helper::getRedirectUri(),
    OAuth2Helper::getClientId(),
    OAuth2Helper::getClientSecret()
);

OAuth2Helper::saveTokenResponse($tokens);

header('Location: /');
