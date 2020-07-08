<?php

use Helpers\Trello;
use Helpers\UrlHelper;

$authUrl = Trello::getAuthUrl(
    getEnvOrException('TRELLO_API_KEY'),
    UrlHelper::generateServerUri().'/oauth/trello/callback'
);

header('Location: '.$authUrl);
