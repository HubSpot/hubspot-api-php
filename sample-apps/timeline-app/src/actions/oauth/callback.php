<?php

use Helpers\HubspotClientHelper;
use Helpers\OAuth2Helper;
use Repositories\TokensRepository;

$response = HubspotClientHelper::getOAuth2Resource()->getTokensByCode(
    OAuth2Helper::getClientId(),
    OAuth2Helper::getClientSecret(),
    OAuth2Helper::getRedirectUri(),
    $_GET['code']
);

if (HubspotClientHelper::isResponseSuccessful($response)) {
    TokensRepository::save($response->toArray());

    header('Location: /');
}
