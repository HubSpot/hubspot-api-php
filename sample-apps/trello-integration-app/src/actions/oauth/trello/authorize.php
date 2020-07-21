<?php

use Helpers\TrelloOAuth;
use Helpers\UrlHelper;

$authUrl = TrelloOAuth::getAuthUrl(
    getEnvOrException('TRELLO_API_KEY'),
    UrlHelper::generateServerUri().'/oauth/trello/callback'
);

header('Location: '.$authUrl);
