<?php

namespace HubSpot\Discovery\Marketing\Transactional;

use HubSpot\Client\Marketing\Transactional\Api\SendTransactionalEmailApi;
use HubSpot\Client\Marketing\Transactional\Api\SMTPTokensApi;
use HubSpot\Client\Marketing\Transactional\Configuration;
use HubSpot\Discovery\DiscoveryBase;

/**
 * @method SendTransactionalEmailApi sendTransactionalEmailApi()
 */
class Discovery extends DiscoveryBase
{
    public function smtpTokensApi()
    {
        $config = $this->config->convertToClientConfig(Configuration::class);

        return new SMTPTokensApi($this->client, $config);
    }
}
