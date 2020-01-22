<?php

use Helpers\Oauth2Helper;

include_once '../../vendor/autoload.php';

session_start();
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

try {
    // allowed for anonymous
    $publicRoutes = require '../routes/public.php';
    // protected
    $protectedRoutes = require '../routes/protected.php';

//    if (!in_array($uri, $publicRoutes) && !Oauth2Helper::isAuthenticated()) {
//        header('Location: /oauth/login.php');
//        exit();
//    }

    if ('/' === $uri) {
        header('Location: /companies/list.php');
        exit();
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
