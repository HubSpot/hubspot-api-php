<?php

use Helpers\OAuth2Helper;

include_once '../../vendor/autoload.php';

session_start();
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

try {
    // allowed for anonymous
    $publicRoutes = require '../routes/public.php';
    // protected
    $protectedRoutes = require '../routes/protected.php';

    if (in_array($uri, $protectedRoutes)) {
        if (empty($_ENV['HUBSPOT_API_KEY']) && !OAuth2Helper::isAuthenticated()) {
            header('Location: /oauth/login');

            exit();
        }
    }

    if ('/' === $uri) {
        header('Location: /companies/list');

        exit();
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
