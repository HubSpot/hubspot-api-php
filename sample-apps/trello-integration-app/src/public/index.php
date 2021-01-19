<?php

use Helpers\DBClientHelper;
use Helpers\OAuth2Helper;
use Helpers\TrelloOAuth;
use Helpers\UrlHelper;
use Repositories\SettingsRepository;

include_once '../../vendor/autoload.php';
session_start();

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

try {
    DBClientHelper::runMigrations();

    // allowed for anonymous
    $publicRoutes = require '../routes/public.php';
    // protected
    $protectedRoutes = require '../routes/protected.php';

    if ('/' === $uri) {
        header('Location: /readme');

        exit();
    }

    if (in_array($uri, $protectedRoutes)) {
        if (!OAuth2Helper::isAuthenticated() || !TrelloOAuth::isAuthenticated()) {
            header('Location: /oauth/login');

            exit();
        }
    }

    if (OAuth2Helper::isAuthenticated() && TrelloOAuth::isAuthenticated()) {
        if (('/cards/init' !== $uri)
                && (SettingsRepository::getSetting(SettingsRepository::INIT_URL) != UrlHelper::generateServerUri())) {
            header('Location: /cards/init');

            exit();
        }
    }

    if (!in_array($uri, array_merge($publicRoutes, $protectedRoutes))) {
        http_response_code(404);

        exit();
    }

    $path = __DIR__.'/../actions'.$uri.'.php';

    require $path;
} catch (Throwable $t) {
    $message = $t->getMessage();

    include __DIR__.'/../views/error.php';

    exit();
}
