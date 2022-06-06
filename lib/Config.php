<?php

namespace HubSpot;

use HubSpot\Client\Crm\Contacts\Configuration;

class Config
{
    public const API_KEY_IDENTIFIER = 'hapikey';

    /** @var string */
    protected $apiKey;

    /** @var string */
    protected $accessToken;

    /** @var string */
    protected $userAgent;

    public function __construct()
    {
        $package = $this->extractPackageNameAndVersionFromComposerFile();
        $name = str_replace('/', '-', $package['name']);
        $this->userAgent = "{$name}-php; {$package['version']}";
    }

    /**
     * @param $clientConfigClassName
     *
     * @return Configuration
     */
    public function convertToClientConfig($clientConfigClassName)
    {
        /** @var Configuration $clientConfig */
        $clientConfig = new $clientConfigClassName();

        $clientConfig->setApiKey(static::API_KEY_IDENTIFIER, $this->apiKey);
        $clientConfig->setAccessToken($this->accessToken);

        $clientConfig->setUserAgent($this->userAgent);
        $clientConfig->setBooleanFormatForQueryString($clientConfig::BOOLEAN_FORMAT_STRING);
        $clientConfig::setDefaultConfiguration($clientConfig);

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

    protected function extractPackageNameAndVersionFromComposerFile()
    {
        return json_decode(file_get_contents(__DIR__.'/../composer.json'), true);
    }
}
