<?php

namespace HubSpot;

use SevenShores\Hubspot\Http\Client;

/**
 * Class Factory.
 *
 * @method \Swagger\Client\Api\SearchApi         searchApi()
 * @method \Swagger\Client\Api\CreateNativeObjectsApi createNativeObjectsApi
 */
class Factory
{
    /** @var Client */
    private $client;

    /**
     * C O N S T R U C T O R ( ^_^)y.
     *
     * @param array  $config        An array of configurations. You need at least the 'key'.
     * @param Client $client
     * @param array  $clientOptions options to be send with each request
     * @param bool   $wrapResponse  wrap request response in own Response object
     */
    public function __construct($config = [], $client = null, $clientOptions = [], $wrapResponse = true)
    {
        $this->client = $client ?: new Client($config, null, $clientOptions, $wrapResponse);
    }

    /**
     * Return an instance of a Resource based on the method called.
     *
     * @param string $name
     * @param array  $arguments
     * @param mixed  $args
     *
     * @return \SevenShores\Hubspot\Resources\Resource
     */
    public function __call($name, $args)
    {
        $resource = '\\Swagger\\Client\\Api\\'.ucfirst($name);

        return new $resource($this->client);
    }

    /**
     * @return Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Create an instance of the service with an API key.
     *
     * @param string $api_key       hubspot API key
     * @param Client $client        an Http client
     * @param array  $clientOptions options to be send with each request
     * @param bool   $wrapResponse  wrap request response in own Response object
     *
     * @return static
     */
    public static function create($api_key = null, $client = null, $clientOptions = [], $wrapResponse = true)
    {
        return new static(['key' => $api_key], $client, $clientOptions, $wrapResponse);
    }

    /**
     * Create an instance of the service with an OAuth token.
     *
     * @param string $token         hubspot oauth access token
     * @param Client $client        an Http client
     * @param array  $clientOptions options to be send with each request
     * @param bool   $wrapResponse  wrap request response in own Response object
     *
     * @return static
     */
    public static function createWithToken($token, $client = null, $clientOptions = [], $wrapResponse = true)
    {
        return new static(['key' => $token, 'oauth' => true], $client, $clientOptions, $wrapResponse);
    }

    /**
     * Create an instance of the service with an OAuth2 token.
     *
     * @param string $token         hubspot OAuth2 access token
     * @param Client $client        an Http client
     * @param array  $clientOptions options to be send with each request
     * @param bool   $wrapResponse  wrap request response in own Response object
     *
     * @return static
     */
    public static function createWithOAuth2Token($token, $client = null, $clientOptions = [], $wrapResponse = true)
    {
        return new static(['key' => $token, 'oauth2' => true], $client, $clientOptions, $wrapResponse);
    }
}
