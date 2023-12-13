<?php

namespace HubSpot\Discovery\Cms\SourceCode;

use HubSpot\Client\Cms\SourceCode\Api\ContentApi;
use HubSpot\Client\Cms\SourceCode\Api\ExtractApi;
use HubSpot\Client\Cms\SourceCode\Api\MetadataApi;
use HubSpot\Client\Cms\SourceCode\Api\SourceCodeExtractApi;
use HubSpot\Client\Cms\SourceCode\Api\ValidationApi;
use HubSpot\Discovery\DiscoveryBase;

/**
 * @method ContentApi           contentApi()
 * @method ExtractApi           extractApi()
 * @method MetadataApi          metadataApi()
 * @method SourceCodeExtractApi sourceCodeExtractApi()
 * @method ValidationApi        validationApi()
 */
class Discovery extends DiscoveryBase {}
