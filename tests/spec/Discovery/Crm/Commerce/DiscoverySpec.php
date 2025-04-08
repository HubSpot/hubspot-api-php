<?php

namespace spec\HubSpot\Discovery\Crm\Objects;

use GuzzleHttp\Client;
use HubSpot\Config;
use HubSpot\Discovery\Crm\Commerce\Discovery;
use HubSpot\Discovery\Crm\Commerce\Invoices\Discovery as InvoicesDiscovery;
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
        $this->invoices()->shouldHaveType(InvoicesDiscovery::class);
    }
}
