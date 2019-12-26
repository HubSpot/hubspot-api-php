<?php

namespace HubSpot\Discovery;

use Exception;
use GuzzleHttp\Client;
use HubSpot\Config;
use ReflectionClass;
use ReflectionException;

class DiscoveryBase
{
    /** @var Client */
    protected $client;

    /** @var Config */
    protected $config;

    public function __construct($client, $config)
    {
        $this->client = $client;
        $this->config = $config;
    }

    /**
     * @param string $name
     * @param mixed  $args
     *
     * @throws Exception
     * @throws ReflectionException
     *
     * @return mixed
     */
    public function __call($name, $args)
    {
        $namespace = (new ReflectionClass(get_class($this)))->getNamespaceName();
        $discoveryClassName = $namespace.'\\'.ucfirst($name).'\\Discovery';

        if (class_exists($discoveryClassName)) {
            return new $discoveryClassName($this->client, $this->config);
        }

        $clientNamespace = str_replace('Discovery', 'Client', $namespace);
        $clientClassName = $clientNamespace.'\\Api\\'.ucfirst($name);
        if (class_exists($clientClassName)) {
            $clientConfigClassName = $clientNamespace.'\\Configuration';
            $config = $this->config->convertToClientConfig($clientConfigClassName);

            return new $clientClassName($this->client, $config);
        }

        throw new Exception('Unable to discover "'.$name.'" client');
    }
}
