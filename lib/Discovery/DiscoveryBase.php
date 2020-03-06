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
        if (method_exists($this, $name)) {
            return $this->{$name}(...$args);
        }

        $namespace = (new ReflectionClass(get_class($this)))->getNamespaceName();

        $intermediateDiscoveryClassName = $namespace.'\\'.ucfirst($name).'\\Discovery';
        if (class_exists($intermediateDiscoveryClassName)) {
            return new $intermediateDiscoveryClassName($this->client, $this->config);
        }

        $targetClientNamespace = str_replace('Discovery', 'Client', $namespace);
        $targetClientClassName = $targetClientNamespace.'\\Api\\'.ucfirst($name);
        if (class_exists($targetClientClassName)) {
            $targetClientConfigClassName = $targetClientNamespace.'\\Configuration';
            $config = $this->config->convertToClientConfig($targetClientConfigClassName);

            return new $targetClientClassName($this->client, $config);
        }

        throw new Exception('Unable to discover "'.$name.'" client');
    }
}
