<?php

namespace Helpers;

class UrlHelper
{
    public static function generateServerUri(): string
    {
        $serverName = $_SERVER['SERVER_NAME'];

        if (!in_array($_SERVER['SERVER_PORT'], [80, 443])) {
            $port = ":{$_SERVER['SERVER_PORT']}";
        } else {
            $port = '';
        }

        if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO']) {
            $scheme = 'https';
        } else {
            $scheme = 'http';
        }

        return $scheme.'://'.$serverName.$port;
    }
}
