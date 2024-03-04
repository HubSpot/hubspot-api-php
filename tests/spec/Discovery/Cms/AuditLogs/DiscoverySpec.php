<?php

namespace spec\HubSpot\Discovery\Cms\AuditLogs;

use GuzzleHttp\Client;
use HubSpot\Client\Cms\AuditLogs\Api\AuditLogsApi;
use HubSpot\Config;
use HubSpot\Discovery\Cms\AuditLogs\Discovery;
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
        $this->auditLogsApi()->shouldHaveType(AuditLogsApi::class);
    }
}
