<?php

namespace Hubspot\Tests\Unit\Http;

use HubSpot\Config;
use HubSpot\Http\Request;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
class RequestTest extends TestCase
{
    public const BASE_URL = 'https://api.hubapi.com';

    /** @test */
    public function emptyConfigAndOptions(): void
    {
        $config = new Config();

        $request = new Request($config, []);

        $this->assertSame($this::BASE_URL, $request->getUrl());
        $this->assertSame('GET', $request->getMethod());
        $this->assertSame(['headers' => $this->getHeaders($config)], $request->getOptionsForSending());
    }

    /** @test */
    public function getContacts(): void
    {
        $config = new Config();
        $config->setApiKey('api-key');

        $request = new Request($config, [
            'path' => '/crm/v3/objects/contacts',
        ]);

        $this->assertSame($this::BASE_URL.'/crm/v3/objects/contacts?hapikey=api-key', $request->getUrl());
        $this->assertSame('GET', $request->getMethod());
        $this->assertSame(['headers' => $this->getHeaders($config)], $request->getOptionsForSending());
    }

    /** @test */
    public function createContacts(): void
    {
        $config = new Config();

        $body = [
            'properties' => [
                'email' => 'theFirst@apiRequest.com',
            ],
        ];

        $request = new Request($config, [
            'path' => '/crm/v3/objects/contacts',
            'method' => 'POST',
            'body' => $body,
        ]);

        $this->assertSame($this::BASE_URL.'/crm/v3/objects/contacts', $request->getUrl());
        $this->assertSame('POST', $request->getMethod());
        $this->assertSame([
            'headers' => $this->getHeaders($config),
            'body' => json_encode($body),
        ], $request->getOptionsForSending());
    }

    /** @test */
    public function createContactsDefaultJsonFasle(): void
    {
        $config = new Config();

        $body = [
            'properties' => [
                'email' => 'theFirst@apiRequest.com',
            ],
        ];

        $request = new Request($config, [
            'path' => '/crm/v3/objects/contacts',
            'method' => 'POST',
            'body' => $body,
            'defaultJson' => false,
        ]);

        $this->assertSame($this::BASE_URL.'/crm/v3/objects/contacts', $request->getUrl());
        $this->assertSame('POST', $request->getMethod());
        $this->assertSame([
            'headers' => $this->getHeaders($config, false),
            'body' => $body,
        ], $request->getOptionsForSending());
    }

    protected function getHeaders(Config $config, bool $defaultJson = true): array
    {
        $headers = [
            'Content-Type' => 'application/json',
            'User-agent' => $config->getUserAgent(),
            'Accept' => 'application/json, */*;q=0.8',
        ];

        if (!$defaultJson) {
            unset($headers['Accept'], $headers['Content-Type']);
        }

        return $headers;
    }
}
