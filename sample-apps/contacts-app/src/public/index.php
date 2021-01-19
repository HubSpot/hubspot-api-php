<?php

use Helpers\OAuth2Helper;

include_once '../../vendor/autoload.php';

session_start();

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

if ('/' === $uri) {
    header('Location: /contacts/list');

    exit();
}

try {
    $publicRoutes = require '../routes/public.php';
    $protectedRoutes = require '../routes/protected.php';

    if (in_array($uri, $protectedRoutes)) {
        if (empty($_ENV['HUBSPOT_API_KEY']) && !OAuth2Helper::isAuthenticated()) {
            header('Location: /oauth/login');

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
