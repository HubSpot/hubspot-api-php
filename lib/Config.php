<?php

namespace HubSpot;

use HubSpot\Client\Crm\Objects\Configuration;

class Config
{
    const API_KEY_IDENTIFIER = 'hapikey';

    /** @var string */
    protected $apiKey;

    /** @var string */
    protected $accessToken;

    /** @var string */
    protected $userAgent;

    public function __construct()
    {
        $package = json_decode(file_get_contents(__DIR__.'/../composer.json'), true);
        $this->setUserAgent("{$package['name']}; {$package['version']}");
    }

    /**
     * @param $clientConfigClassName
     * @return Configuration
     */
    public function convertToClientConfig($clientConfigClassName)
    {
        /** @var Configuration $clientConfig */
        $clientConfig = new $clientConfigClassName();
        if (null !== $this->apiKey) {
            $clientConfig->setApiKey(static::API_KEY_IDENTIFIER, $this->apiKey);
        }
        if (null !== $this->accessToken) {
            $clientConfig->setAccessToken($this->accessToken);
        }

        $clientConfig->setUserAgent($this->userAgent);

        return $clientConfig;
    }

    /**
     * @return string
     */
    public function getUserAgent()
    {
        return $this->userAgent;
    }

    /**
     * @param string $userAgent
     */
    public function setUserAgent($userAgent)
    {
        $this->userAgent = $userAgent;
    }

    /**
     * @return string
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }

    /**
     * @param string $accessToken
     */
    public function setAccessToken($accessToken)
    {
        $this->accessToken = $accessToken;
    }

    /**
     * @return string
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * @param string $apiKey
     */
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
    }
}
