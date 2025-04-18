<?php

namespace HubSpot\Discovery\Crm\Extensions\Calling;

use HubSpot\Client\Crm\Extensions\Calling\Api\ChannelConnectionSettingsApi;
use HubSpot\Client\Crm\Extensions\Calling\Api\RecordingSettingsApi;
use HubSpot\Client\Crm\Extensions\Calling\Api\SettingsApi;
use HubSpot\Discovery\DiscoveryBase;

/**
 * @method ChannelConnectionSettingsApi channelConnectionSettingsApi()
 * @method RecordingSettingsApi         recordingSettingsApi()
 * @method SettingsApi                  settingsApi()
 */
class Discovery extends DiscoveryBase {}
