<?php

namespace Hubspot\Tests\Unit\Utils;

use HubSpot\Utils\OAuth2;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
class OAuth2Test extends TestCase
{
    /** @test */
    public function buildAuthorizationUrl()
    {
        $authUrl = OAuth2::getAuthUrl(
            'clientid',
            'http://localhost',
            ['contacts', 'timeline'],
            ['scope1', 'scope2']
        );

        $this->assertSame(
            'https://app.hubspot.com/oauth/authorize?client_id=clientid&redirect_uri=http%3A%2F%2Flocalhost&scope=contacts%20timeline&optional_scope=scope1%20scope2',
            $authUrl
        );
    }

    /** @test */
    public function buildAuthorizationUrlWithEmptyOptionalScope()
    {
        $authUrl = OAuth2::getAuthUrl(
            'clientid',
            'http://localhost',
            ['contacts', 'timeline']
        );

        $this->assertSame(
            'https://app.hubspot.com/oauth/authorize?client_id=clientid&redirect_uri=http%3A%2F%2Flocalhost&scope=contacts%20timeline',
            $authUrl
        );
    }
}
