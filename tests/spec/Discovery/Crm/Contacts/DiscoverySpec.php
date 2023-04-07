<?php

namespace spec\HubSpot\Discovery\Crm\Contacts;

use GuzzleHttp\Client;
use HubSpot\Client\Crm\Contacts\Api\BasicApi;
use HubSpot\Client\Crm\Contacts\Api\BatchApi;
use HubSpot\Client\Crm\Contacts\Api\GDPRApi;
use HubSpot\Client\Crm\Contacts\Api\PublicObjectApi;
use HubSpot\Client\Crm\Contacts\Api\SearchApi;
use HubSpot\Config;
use PhpSpec\ObjectBehavior;

class DiscoverySpec extends ObjectBehavior
{
    public function let(Client $client, Config $config)
    {
        $this->beConstructedWith($client, $config);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(\HubSpot\Discovery\Crm\Contacts\Discovery::class);
    }

    public function it_creates_clients()
    {
        $this->basicApi()->shouldHaveType(BasicApi::class);
        $this->batchApi()->shouldHaveType(BatchApi::class);
        $this->gdprApi()->shouldHaveType(GDPRApi::class);
        $this->publicObjectApi()->shouldHaveType(PublicObjectApi::class);
        $this->searchApi()->shouldHaveType(SearchApi::class);
    }
}
