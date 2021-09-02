<?php

namespace spec\HubSpot\Discovery\Crm\Objects;

use GuzzleHttp\Client;
use HubSpot\Client\Crm\Objects\Api\AssociationsApi;
use HubSpot\Client\Crm\Objects\Api\BasicApi;
use HubSpot\Client\Crm\Objects\Api\BatchApi;
use HubSpot\Client\Crm\Objects\Api\GDPRApi;
use HubSpot\Client\Crm\Objects\Api\SearchApi;
use HubSpot\Config;
use HubSpot\Discovery\Crm\Objects\Discovery;
use HubSpot\Discovery\Crm\Objects\FeedbackSubmissions\Discovery as FeedbackSubmissionsDiscovery;
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
        $this->associationsApi()->shouldHaveType(AssociationsApi::class);
        $this->basicApi()->shouldHaveType(BasicApi::class);
        $this->batchApi()->shouldHaveType(BatchApi::class);
        $this->gdprApi()->shouldHaveType(GDPRApi::class);
        $this->feedbackSubmissions()->shouldHaveType(FeedbackSubmissionsDiscovery::class);
        $this->searchApi()->shouldHaveType(SearchApi::class);
    }
}
