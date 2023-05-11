<?php

namespace spec\HubSpot\Discovery\Crm\Associations\V4;

use GuzzleHttp\Client;
use HubSpot\Client\Crm\Associations\V4\Api\BasicApi;
use HubSpot\Client\Crm\Associations\V4\Api\BatchApi;
use HubSpot\Config;
use HubSpot\Discovery\Crm\Associations\V4\Schema\Discovery as SchemaDiscovery;
use PhpSpec\ObjectBehavior;

class DiscoverySpec extends ObjectBehavior
{
    public function let(Client $client, Config $config)
    {
        $this->beConstructedWith($client, $config);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(\HubSpot\Discovery\Crm\Associations\V4\Discovery::class);
    }

    public function it_creates_clients()
    {
        $this->basicApi()->shouldHaveType(BasicApi::class);
        $this->batchApi()->shouldHaveType(BatchApi::class);
        $this->schema()->shouldHaveType(SchemaDiscovery::class);
    }
}
