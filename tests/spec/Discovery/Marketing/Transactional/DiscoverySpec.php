<?php

namespace spec\HubSpot\Discovery\Marketing\Transactional;

use GuzzleHttp\Client;
use HubSpot\Client\Marketing\Transactional\Api\SendTransactionalEmailApi;
use HubSpot\Client\Marketing\Transactional\Api\SMTPTokensApi;
use HubSpot\Config;
use HubSpot\Discovery\Marketing\Transactional\Discovery;
use PhpSpec\ObjectBehavior;

class DiscoverySpec extends ObjectBehavior
{
    public function let(Client $client, Config $config)
    {
        $this->beConstructedWith($client, $config);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Discovery::class);
    }

    public function it_creates_clients()
    {
        $this->sendTransactionalEmailApi()->shouldHaveType(SendTransactionalEmailApi::class);
        $this->smtpTokensApi()->shouldHaveType(SMTPTokensApi::class);
    }
}
