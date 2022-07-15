<?php

namespace HubSpot\Utils;

use Exception;

/**
 * @deprecated
 */
class Webhooks
{
    /**
     * Validation of Hubspot Signature.
     *
     * @deprecated
     *
     * @param string $signature   hubspot signarute
     * @param string $secret      the Secret of your app
     * @param string $requestBody a set of scopes that your app will need access to
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
        if ('v1' == $signatureVersion) {
            $sourceString = $secret.$requestBody;
        } elseif ('v2' == $signatureVersion) {
            $sourceString = $secret.$httpMethod.$httpUri.$requestBody;
        } else {
            throw new Exception("Not supported signature version: {$signatureVersion}");
        }

        return $signature == hash('sha256', $sourceString);
    }
}
