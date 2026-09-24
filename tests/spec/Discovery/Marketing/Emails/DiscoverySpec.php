<?php

namespace spec\HubSpot\Discovery\Marketing\Emails;

use GuzzleHttp\Client;
use HubSpot\Client\Marketing\Emails\Api\BasicApi;
use HubSpot\Client\Marketing\Emails\Api\EmailsApi;
use HubSpot\Config;
use HubSpot\Discovery\Marketing\Emails\Discovery;
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
        $this->basicApi()->shouldHaveType(BasicApi::class);
        $this->emailsApi()->shouldHaveType(EmailsApi::class);
    }
}
