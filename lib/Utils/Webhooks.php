<?php

namespace HubSpot\Utils;

use Exception;

class Webhooks
{
    /**
     * Validation of Hubspot Signature.
     *
     * @param string $signature   hubspot signarute
     * @param string $secret      the Secret of your app
     * @param string $requestBody a set of scopes that your app will need access to
     *
     * @return bool
     */
    public static function isHubspotSignatureValid(
        string $signature,
        string $secret,
        string $requestBody,
        string $httpUri = null,
        string $httpMethod = 'POST',
        string $signatureVersion = 'v1'
    ): bool {
        $sourceString = null;
        if ($signatureVersion == 'v1') {
            $sourceString = $secret.$requestBody;
        } else if ($signatureVersion == 'v2') {
            $sourceString = $secret.$httpMethod.$httpUri.$requestBody;
        } else {
            throw new Exception("Not supported signature version: $signatureVersion");
        }
        
        return $signature == hash('sha256', $sourceString);
    }
}
