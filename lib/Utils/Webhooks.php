<?php

namespace HubSpot\Utils;

use UnexpectedValueException;

class Webhooks
{
    /**
     * Validation of Hubspot Signature.
     *
     * @param string $signature   hubspot signature
     * @param string $secret      the Secret of your app
     * @param string $requestBody a set of scopes that your app will need access to
     * @throws UnexpectedValueException
     */
    public static function isHubspotSignatureValid(
        string $signature,
        string $secret,
        string $requestBody,
        string $httpUri = null,
        string $httpMethod = 'POST',
        string $signatureVersion = 'v1',
        int $timestamp = null,
        int $maxAllowedTimestamp = 300000
    ): bool {
        if ('v1' == $signatureVersion) {
            $sourceString = $secret.$requestBody;
            $hashString = hash('sha256', $sourceString);
        } elseif ('v2' == $signatureVersion) {
            $sourceString = $secret.$httpMethod.$httpUri.$requestBody;
            $hashString = hash('sha256', $sourceString);
        } elseif ('v3' === $signatureVersion) {
            if ($timestamp === null) {
                throw new UnexpectedValueException ('$timestamp parameter cannot be null');
            }
            if (time() - $timestamp > $maxAllowedTimestamp) {
                return false;
            }
            $sourceString = $httpMethod . $httpUri . $requestBody . $timestamp;
            $hashString = base64_encode(hash_hmac('sha256', $sourceString, $secret, true));
        } else {
            throw new UnexpectedValueException("Not supported signature version: {$signatureVersion}");
        }

        return hash_equals($signature, $hashString);
    }
}
