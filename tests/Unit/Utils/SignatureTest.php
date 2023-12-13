<?php

namespace Hubspot\Tests\Unit\Utils;

use HubSpot\Utils\Signature;
use HubSpot\Utils\Timestamp;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
class SignatureTest extends TestCase
{
    /** @test */
    public function isValidTest(): void
    {
        $this->assertTrue(Signature::isValid([
            'signature' => '232db2615f3d666fe21a8ec971ac7b5402d33b9a925784df3ca654d05f4817de',
            'secret' => 'yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy',
            'requestBody' => '[{"eventId":1,"subscriptionId":12345,"portalId":62515,"occurredAt":1564113600000,"subscriptionType":"contact.creation","attemptNumber":0,"objectId":123,"changeSource":"CRM","changeFlag":"NEW","appId":54321}]',
        ]));
        $this->assertTrue(Signature::isValid([
            'signature' => 'eee2dddcc73c94d699f5e395f4b9d454a069a6855fbfa152e91e88823087200e',
            'secret' => 'yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy',
            'requestBody' => '',
            'httpUri' => 'https://www.example.com/webhook_uri',
            'httpMethod' => 'GET',
            'signatureVersion' => 'v2',
        ]));
        $this->assertTrue(Signature::isValid([
            'signature' => '9569219f8ba981ffa6f6f16aa0f48637d35d728c7e4d93d0d52efaa512af7900',
            'secret' => 'yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy',
            'requestBody' => '{"example_field":"example_value"}',
            'httpUri' => 'https://www.example.com/webhook_uri',
            'httpMethod' => 'POST',
            'signatureVersion' => 'v2',
        ]));

        $this->assertTrue(Signature::isValid(static::getOptionsForSignatureV3()));

        $timestamp = Timestamp::getCurrentTimestampWithMilliseconds() - (Signature::MAX_ALLOWED_TIMESTAMP + 500);
        $options = static::getOptionsForSignatureV3($timestamp);
        $this->assertFalse(Signature::isValid($options));

        $options['checkTimestamp'] = false;
        $this->assertTrue(Signature::isValid($options));
    }

    public static function getOptionsForSignatureV3(int $timestamp = 0): array
    {
        if (empty($timestamp)) {
            $timestamp = Timestamp::getCurrentTimestampWithMilliseconds();
        }
        $options = [
            'secret' => 'yyyyyyyy-yyyy-yyyy-yyyy-yyyyyyyyyyyy',
            'requestBody' => '{"example_field":"example_value"}',
            'httpUri' => 'https://www.example.com/webhook_uri',
            'httpMethod' => 'POST',
            'signatureVersion' => 'v3',
            'timestamp' => $timestamp,
        ];
        $options['signature'] = static::generateHubspotSignatureV3($options['secret'], $options['requestBody'], $options['httpUri'], $options['httpMethod'], $options['timestamp']);

        return $options;
    }

    /** @test */
    public function unexpectedValueExceptionVersionTest(): void
    {
        $this->expectException(\UnexpectedValueException::class);
        $this->expectExceptionMessage('Not supported signature version: v4');
        Signature::isValid(['signatureVersion' => 'v4']);
    }

    /** @test */
    public function unexpectedValueExceptionTimestampTest(): void
    {
        $this->expectException(\UnexpectedValueException::class);
        $this->expectExceptionMessage('Not provided timestamp');
        Signature::isValid([
            'signatureVersion' => 'v3',
        ]);
    }

    public static function generateHubspotSignatureV3(
        string $secret,
        string $requestBody,
        string $httpUri = null,
        string $httpMethod = 'POST',
        int $timestamp = null
    ): string {
        $sourceString = $httpMethod.$httpUri.$requestBody.$timestamp;

        return base64_encode(hash_hmac('sha256', $sourceString, $secret, true));
    }
}
