<?php

namespace HubSpot\Http;

use HubSpot\Config;

class Auth
{
    public static function chooseAuth(array $options, Config $config): array
    {
        $auth = [
            'type' => null,
            'value' => null,
        ]; 

        if (array_key_exists('authType', $options)) {
            if ($options['authType'] !== 'none' && in_array($options['authType'], static::getAuthTypes())) {
                $method = static::getAuthTypes()[$options['authType']];
                if (!empty($config->$method())) {
                    $auth['type'] = $options['authType'];
                    $auth['value'] = $config->$method();
                }
            }
        } else {
            foreach(static::getAuthTypes() as $type => $method) {
                if (!empty($config->$method())) {
                    $auth['type'] = $type;
                    $auth['value'] = $config->$method();
                    break;
                }
            }
        }
    
        return $auth;
    }

    public static function getAuthTypes(): array
    {
        return [
            'hapikey' => 'getApiKey',
            'accessToken' => 'getAccessToken',
        ];
    }

}
