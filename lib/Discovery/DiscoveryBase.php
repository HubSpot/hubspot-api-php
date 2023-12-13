<?php

namespace HubSpot\Discovery;

use GuzzleHttp\Client;
use HubSpot\Config;

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
     * @return mixed
     *
     * @throws \Exception
     * @throws \ReflectionException
     */
    public function __call($name, $args)
    {
        if (method_exists($this, $name)) {
            return $this->{$name}(...$args);
        }

        $namespace = (new \ReflectionClass(get_class($this)))->getNamespaceName();

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

        throw new \Exception('Unable to discover "'.$name.'" client');
    }
}
