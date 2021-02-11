<?php

namespace spec\HubSpot\Discovery\Files;

use GuzzleHttp\Client;
use HubSpot\Client\Files\Api\FilesApi;
use HubSpot\Client\Files\Api\FoldersApi;
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
        $this->shouldHaveType(\HubSpot\Discovery\Files\Discovery::class);
    }

    public function it_creates_clients()
    {
        $this->filesApi()->shouldHaveType(FilesApi::class);
        $this->foldersApi()->shouldHaveType(FoldersApi::class);
    }
}
