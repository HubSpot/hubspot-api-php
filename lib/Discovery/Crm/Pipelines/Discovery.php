<?php

namespace HubSpot\Discovery\Crm\Pipelines;

use HubSpot\Client\Crm\Pipelines\Api\PipelineAuditsApi;
use HubSpot\Client\Crm\Pipelines\Api\PipelinesApi;
use HubSpot\Client\Crm\Pipelines\Api\PipelineStageAuditsApi;
use HubSpot\Client\Crm\Pipelines\Api\PipelineStagesApi;
use HubSpot\Discovery\DiscoveryBase;

/**
 * @method PipelineAuditsApi      pipelineAuditsApi()
 * @method PipelinesApi           pipelinesApi()
 * @method PipelineStageAuditsApi pipelineStageAuditsApi()
 * @method PipelineStagesApi      pipelineStagesApi()
 */
class Discovery extends DiscoveryBase {}
