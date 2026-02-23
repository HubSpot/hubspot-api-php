<?php

namespace spec\HubSpot\Discovery\Marketing\Emails;

use GuzzleHttp\Client;
use HubSpot\Client\Marketing\Emails\Api\EmailsApi;
use HubSpot\Client\Marketing\Emails\Api\StatisticsApi;
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
        $this->emailsApi()->shouldHaveType(EmailsApi::class);
        $this->statisticsApi()->shouldHaveType(StatisticsApi::class);
    }
}
