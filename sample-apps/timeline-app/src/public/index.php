<?php

use Enums\EventTypeCode;
use Helpers\DBClientHelper;
use Helpers\OAuth2Helper;
use Repositories\EventTypesRepository;

require_once '../../vendor/autoload.php';

session_start();
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

try {
    DBClientHelper::runMigrations();

    $publicRoutes = require '../routes/public.php';
    $protectedRoutes = require '../routes/protected.php';

    if (!in_array($uri, $publicRoutes)) {
        if (!OAuth2Helper::isAuthenticated()) {
            header('Location: /oauth/login');
        } elseif (!EventTypesRepository::getHubspotEventIDByCode(EventTypeCode::BOT_ADDED)
                || !EventTypesRepository::getHubspotEventIDByCode(EventTypeCode::USER_INVITATION_ACTION)) {
            header('Location: /events/init');
        }
    }

    if ('/' === $uri) {
        header('Location: /telegram/link');

        exit();
    }

    if (!in_array($uri, array_merge($publicRoutes, $protectedRoutes))) {
        http_response_code(404);

        exit();
    }

    $path = __DIR__.'/../actions'.$uri.'.php';

    require $path;
} catch (Throwable $throwable) {
    $message = $throwable->getMessage();

    include __DIR__.'/../views/error.php';

    exit();
}
