<?php

namespace HubSpot\Utils;

use Exception;

class Signature
{
    /**
     * Reject the request if the timestamp is older than 5 minutes. Otherwise, proceed with validating the signature.
     * 5 minutes in milliseconds
     */
    const MAX_ALLOWED_TIMESTAMP = 300000;
    
    /**
     * Validation of Hubspot Signature.
     *
     * @param array<signature: string, secret: string, requestBody: string, httpUri: string, httpMethod: string, timestamp?: string, signatureVersion: string> $options
     * @param string $secret['signature']           hubspot signarute 
     * @param string $secret['secret']              the Secret of your app
     * @param string $secret['requestBody']         the request body include the payload of the request as a JSON string.
     * @param string $secret['httpUri']             the full URL of the incoming request, including the http:// prefix, the path of your endpoint, and any query parameters
     * @param string $secret['httpMethod']          the method of the incoming request, such as GET or POST
     * @param string $secret['timestamp']           a unix timestamp of the request, provided in the X-HubSpot-Request-Timestamp header
     * @param string $secret['signatureVersion']    signature version (V1, V2 or V3)
     */
    public static function isValid(
        array $options
    ): bool {
        $signatureVersion = static::getOption('signatureVersion', $options);

        if ($signatureVersion === 'v3') {
            $currentTimestamp = intval(microtime(true) * 1000);
            $timestamp = (int) static::getOption('timestamp', $options);
            if (($currentTimestamp - $timestamp) > static::MAX_ALLOWED_TIMESTAMP) {
                throw new Exception("Timestamp is invalid, reject request");
            }
        }

        $hash = static::getHashedSignature($signatureVersion, $options);

        return hash_equals(static::getOption('signature', $options), $hash);
    }

     /**
     * Get hashed signature.
     *
     * @param string $signatureVersion              signature version (V1, V2 or V3)
     * @param array<signature: string, secret: string, requestBody: string, httpUri: string, httpMethod: string, timestamp?: string, signatureVersion: string> $options
     * @param string $secret['secret']              the Secret of your app
     * @param string $secret['requestBody']         the request body include the payload of the request as a JSON string.
     * @param string $secret['httpUri']             the full URL of the incoming request, including the http:// prefix, the path of your endpoint, and any query parameters
     * @param string $secret['httpMethod']          the method of the incoming request, such as GET or POST
     * @param string $secret['timestamp']           a unix timestamp of the request, provided in the X-HubSpot-Request-Timestamp header
     */
    public static function getHashedSignature(
        string $signatureVersion,
        array $options
    ): string {
        switch ($signatureVersion) {
            case 'v1': 
                $sourceString = static::getOption('secret', $options).static::getOption('requestBody', $options);
                return hash('sha256', $sourceString);
            case 'v2': 
                $sourceString = static::getOption('secret', $options).static::getOption('httpMethod', $options).static::getOption('httpMethod', $options).static::getOption('requestBody', $options);
                return hash('sha256', $sourceString);
            case 'v3':
                $sourceString = static::getOption('httpMethod', $options).static::getOption('httpUri', $options).static::getOption('requestBody', $options).static::getOption('timestamp', $options);
                return base64_encode(hash_hmac('sha256', $sourceString, static::getOption('secret', $options), true));
            default:
                throw new Exception("Not supported signature version: {$signatureVersion}");
        }
    }

    protected static function getOption(string $name, array $options)
    {
        if (array_key_exists($name, $options)) {
            return $options[$name];
        }

        throw new Exception("Not provided {$name}");
    }
}
