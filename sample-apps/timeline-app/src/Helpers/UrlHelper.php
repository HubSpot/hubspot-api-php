<?php

namespace Helpers;

class UrlHelper
{
    public static function generateServerUri()
    {
        $serverName = $_SERVER['SERVER_NAME'];
        if (!in_array($_SERVER['SERVER_PORT'], [80, 443])) {
            $port = ":{$_SERVER['SERVER_PORT']}";
        } else {
            $port = '';
        }
        if (!empty($_SERVER['HTTPS']) && ('on' == strtolower($_SERVER['HTTPS']) || '1' == $_SERVER['HTTPS'])) {
            $scheme = 'https';
        } else {
            $scheme = 'http';
        }

        return $scheme.'://'.$serverName.$port;
    }
}
