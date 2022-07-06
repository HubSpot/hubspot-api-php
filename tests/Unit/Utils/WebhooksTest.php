<?php

namespace Hubspot\Tests\Unit\Utils;

use HubSpot\Utils\Webhooks;
use PHPUnit\Framework\TestCase;
use UnexpectedValueException;

/**
 * @internal
 * @coversNothing
 */
class WebhooksTest extends TestCase
{
    /** @test */
    public function isHubspotSignatureValidTest(): void
    {
        $this->assertTrue(Webhooks::isHubspotSignatureValid(
            '232db2615f3d666fe21a8ec971ac7b5402d33b9a925784df3ca654d05f4817de',
            'yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy',
            '[{"eventId":1,"subscriptionId":12345,"portalId":62515,"occurredAt":1564113600000,"subscriptionType":"contact.creation","attemptNumber":0,"objectId":123,"changeSource":"CRM","changeFlag":"NEW","appId":54321}]'
        ));
        $this->assertTrue(Webhooks::isHubspotSignatureValid(
            'eee2dddcc73c94d699f5e395f4b9d454a069a6855fbfa152e91e88823087200e',
            'yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy',
            '',
            'https://www.example.com/webhook_uri',
            'GET',
            'v2'
        ));
        $this->assertTrue(Webhooks::isHubspotSignatureValid(
            '9569219f8ba981ffa6f6f16aa0f48637d35d728c7e4d93d0d52efaa512af7900',
            'yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy',
            '{"example_field":"example_value"}',
            'https://www.example.com/webhook_uri',
            'POST',
            'v2'
        ));
        $timestamp = time();
        $secret = 'yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy';
        $requestBody = '{"example_field":"example_value"}';
        $httpUri = 'https://www.example.com/webhook_uri';
        $httpMethod = 'POST';
        $signature = static::generateHubspotSignatureV3($secret, $requestBody, $httpUri, $httpMethod, $timestamp);
        $this->assertTrue(Webhooks::isHubspotSignatureValid(
            $signature,
            $secret,
            $requestBody,
            $httpUri,
            $httpMethod,
            'v3',
            $timestamp
        ));
        $timestamp -= 350000;
        $this->assertFalse(Webhooks::isHubspotSignatureValid(
            $signature,
            $secret,
            $requestBody,
            $httpUri,
            $httpMethod,
            'v3',
            $timestamp
        ));
    }

    /** @test */
    public function UnexpectedValueExceptionVersionTest(): void
    {
        $this->expectException(UnexpectedValueException::class);
        $this->expectExceptionMessage('Not supported signature version: v4');
        Webhooks::isHubspotSignatureValid('', '', '', '', '', 'v4');
    }

    /** @test */
    public function UnexpectedValueExceptionTimestampTest(): void
    {
        $this->expectException(UnexpectedValueException::class);
        $this->expectExceptionMessage('$timestamp cannot be null');
        Webhooks::isHubspotSignatureValid('', '', '', '', '', 'v3');
    }

    /**
     * @param string $secret
     * @param string $requestBody
     * @param string|null $httpUri
     * @param string $httpMethod
     * @param int|null $timestamp
     * @return string
     */
    public static function generateHubspotSignatureV3(
        string $secret,
        string $requestBody,
        string $httpUri = null,
        string $httpMethod = 'POST',
        int $timestamp = null
    ): string {
        $sourceString = $httpMethod . $httpUri . $requestBody . $timestamp;
        return base64_encode(hash_hmac('sha256', $sourceString, $secret, true));
    }
}
