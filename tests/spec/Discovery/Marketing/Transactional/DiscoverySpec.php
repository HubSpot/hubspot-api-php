<?php

namespace spec\HubSpot\Discovery\Marketing\Transactional;

use GuzzleHttp\Client;
use HubSpot\Client\Marketing\Transactional\Api\PublicSMTPTokensApi;
use HubSpot\Client\Marketing\Transactional\Api\SingleSendApi;
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
        $this->publicSMTPTokensApi()->shouldHaveType(PublicSMTPTokensApi::class);
        $this->singleSendApi()->shouldHaveType(SingleSendApi::class);
    }
}
