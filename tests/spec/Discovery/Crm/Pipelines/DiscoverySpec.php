<?php

namespace spec\HubSpot\Discovery\Crm\Pipelines;

use GuzzleHttp\Client;
use HubSpot\Client\Crm\Pipelines\Api\PipelineAuditsApi;
use HubSpot\Client\Crm\Pipelines\Api\PipelinesApi;
use HubSpot\Client\Crm\Pipelines\Api\PipelineStageAuditsApi;
use HubSpot\Client\Crm\Pipelines\Api\PipelineStagesApi;
use HubSpot\Config;
use HubSpot\Discovery\Crm\Pipelines\Discovery;
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
        $this->pipelineAuditsApi()->shouldHaveType(PipelineAuditsApi::class);
        $this->pipelinesApi()->shouldHaveType(PipelinesApi::class);
        $this->pipelineStageAuditsApi()->shouldHaveType(PipelineStageAuditsApi::class);
        $this->pipelineStagesApi()->shouldHaveType(PipelineStagesApi::class);
    }
}
