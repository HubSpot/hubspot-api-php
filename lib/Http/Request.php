<?php

namespace HubSpot\Http;

use HubSpot\Config;

class Request
{
    /** @var array */
    protected $options = [];

    /** @var string */
    protected $baseUrl = 'https://api.hubapi.com';
    protected $body;

    /** @var Config */
    protected $config;

    /** @var bool */
    protected $defaultJson = true;

    /** @var string */
    protected $url;

    /** @var string */
    protected $method;

    /** @var array */
    protected $headers = [];

    public function __construct(Config $config, array $options = [])
    {
        $this->config = $config;
        $this->options = $options;
        if (!empty($config->getBasePath())) {
            $this->baseUrl = $config->getBasePath();
        }

        if (array_key_exists('defaultJson', $this->options)) {
            $this->defaultJson = $this->options['defaultJson'];
        }
        $this->method = $this->options['method'] ?? 'GET';

        $this->initHeaders();
        $this->applyAuth();

        $this->url = $this->generateUrl();
        $this->setBody();
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getOptionsForSending(): array
    {
        $options = [];
        if (!empty($this->headers)) {
            $options['headers'] = $this->headers;
        }

        if (!empty($this->body)) {
            $options['body'] = $this->body;
        }

        return $options;
    }

    protected function applyAuth()
    {
        $auth = Auth::chooseAuth($this->options, $this->config);

        if ($auth['type']) {
            if ('hapikey' === $auth['type']) {
                $this->options['qs']['hapikey'] = $auth['value'];
            }
            if ('developerApiKey' === $auth['type']) {
                $this->options['qs']['hapikey'] = $auth['value'];
            }

            if ('accessToken' === $auth['type']) {
                $this->headers['Authorization'] = "Bearer {$auth['value']}";
            }
        }
    }

    protected function initHeaders()
    {
        if ($this->defaultJson) {
            $this->headers = [
                'Content-Type' => 'application/json',
            ];
        }

        $this->headers = array_merge($this->headers, $this->getDefaultHeaders());
        if (array_key_exists('headers', $this->options)) {
            $this->headers = array_merge($this->headers, $this->options['headers']);
        }
    }

    protected function getDefaultHeaders(): array
    {
        $headers = [
            'User-agent' => $this->config->getUserAgent(),
        ];

        if ($this->defaultJson) {
            $headers['Accept'] = 'application/json, */*;q=0.8';
        }

        return $headers;
    }

    protected function generateUrl(): string
    {
        $urlStr = $this->baseUrl;
        if (array_key_exists('baseUrl', $this->options)) {
            $urlStr = $this->options['baseUrl'];
        }
        $urlStr .= $this->options['path'] ?? '';

        if (array_key_exists('qs', $this->options) && !empty($this->options['qs'])) {
            $urlStr .= '?'.http_build_query($this->options['qs'], '', '&', PHP_QUERY_RFC3986);
        }

        return $urlStr;
    }

    protected function setBody()
    {
        if (array_key_exists('body', $this->options)) {
            $this->body = $this->options['body'];
            if ($this->defaultJson) {
                $this->body = json_encode($this->body);
            }
        }
    }
}
