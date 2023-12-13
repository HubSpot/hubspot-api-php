<?php

namespace spec\HubSpot\Discovery\Crm\Objects;

use GuzzleHttp\Client;
use HubSpot\Client\Crm\Objects\Api\AssociationsApi;
use HubSpot\Client\Crm\Objects\Api\BasicApi;
use HubSpot\Client\Crm\Objects\Api\BatchApi;
use HubSpot\Client\Crm\Objects\Api\GDPRApi;
use HubSpot\Client\Crm\Objects\Api\PublicObjectApi;
use HubSpot\Client\Crm\Objects\Api\SearchApi;
use HubSpot\Config;
use HubSpot\Discovery\Crm\Objects\Calls\Discovery as CallsDiscovery;
use HubSpot\Discovery\Crm\Objects\Communications\Discovery as CommunicationsDiscovery;
use HubSpot\Discovery\Crm\Objects\Discovery;
use HubSpot\Discovery\Crm\Objects\Emails\Discovery as EmailsDiscovery;
use HubSpot\Discovery\Crm\Objects\FeedbackSubmissions\Discovery as FeedbackSubmissionsDiscovery;
use HubSpot\Discovery\Crm\Objects\Goals\Discovery as GoalsDiscovery;
use HubSpot\Discovery\Crm\Objects\Meetings\Discovery as MeetingsDiscovery;
use HubSpot\Discovery\Crm\Objects\Notes\Discovery as NotesDiscovery;
use HubSpot\Discovery\Crm\Objects\PostalMail\Discovery as PostalMailDiscovery;
use HubSpot\Discovery\Crm\Objects\Tasks\Discovery as TasksDiscovery;
use HubSpot\Discovery\Crm\Objects\Taxes\Discovery as TaxesDiscovery;
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
        $this->calls()->shouldHaveType(CallsDiscovery::class);
        $this->communications()->shouldHaveType(CommunicationsDiscovery::class);
        $this->gdprApi()->shouldHaveType(GDPRApi::class);
        $this->emails()->shouldHaveType(EmailsDiscovery::class);
        $this->feedbackSubmissions()->shouldHaveType(FeedbackSubmissionsDiscovery::class);
        $this->goals()->shouldHaveType(GoalsDiscovery::class);
        $this->meetings()->shouldHaveType(MeetingsDiscovery::class);
        $this->notes()->shouldHaveType(NotesDiscovery::class);
        $this->postalMail()->shouldHaveType(PostalMailDiscovery::class);
        $this->publicObjectApi()->shouldHaveType(PublicObjectApi::class);
        $this->searchApi()->shouldHaveType(SearchApi::class);
        $this->tasks()->shouldHaveType(TasksDiscovery::class);
        $this->taxes()->shouldHaveType(TaxesDiscovery::class);
    }
}
