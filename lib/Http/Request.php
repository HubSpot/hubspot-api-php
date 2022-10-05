<?php

namespace HubSpot\Http;

use HubSpot\Config;

class Request
{
    protected array $options = [];
    protected Config $config;
    protected string $baseUrl = 'https://api.hubapi.com';
    protected string $url;
    protected string $method;
    protected array  $headers = [];
    protected $body;
    public function __construct(Config $config, array $options = []) 
    {
        $this->config = $config;
        $this->options = $options;
        if ($config->getBasePath()) {
            $this->baseUrl = $config->getBasePath();
        }
        $this->url = $this.generateUrl();
        // this.method = this.opts.method || 'GET'
        // this.initHeaders()
        // this.applyAuth()
        // this.setBody()
    }

    protected function generateUrl(): string {
        $urlStr = $this->options['overlapUrl'] || $this->baseUrl . ($this->options['path'] || '');
        // if (this.opts.qs) {
        //   const params = new URLSearchParams(this.opts.qs)
        //   urlStr = `${urlStr}?${params}`
        // }
        return $urlStr;
      }

}
