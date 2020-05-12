<?php

use Helpers\OAuth2Helper;

include_once '../../vendor/autoload.php';

session_start();

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

if ('/' === $uri) {
    header('Location: /import/start.php');
    exit();
}

try {
    $publicRoutes = require '../routes/public.php';
    $protectedRoutes = require '../routes/protected.php';
    
    if (in_array($uri, $protectedRoutes)) {
        if (!OAuth2Helper::isAuthenticated()) {
            header('Location: /oauth/login.php');
            exit();
        }
    }

    if (!in_array($uri, array_merge($publicRoutes, $protectedRoutes))) {
        http_response_code(404);
        exit();
    }

    $path = __DIR__.'/../actions'.$uri;
    require $path;
} catch (Throwable $t) {
    $message = $t->getMessage();
    include __DIR__.'/../views/error.php';
    exit();
}
