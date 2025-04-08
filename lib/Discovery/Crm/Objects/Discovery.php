<?php

namespace HubSpot\Discovery\Crm\Objects;

use HubSpot\Client\Crm\Objects\Api\BasicApi;
use HubSpot\Client\Crm\Objects\Api\BatchApi;
use HubSpot\Client\Crm\Objects\Api\SearchApi;
use HubSpot\Discovery\DiscoveryBase;

/**
 * @method BasicApi                      basicApi()
 * @method BatchApi                      batchApi()
 * @method Calls\Discovery               calls()
 * @method Communications\Discovery      communications()
 * @method DealSplits\Discovery          dealSplits()
 * @method Emails\Discovery              emails()
 * @method FeedbackSubmissions\Discovery feedbackSubmissions()
 * @method Goals\Discovery               goals()
 * @method Leads\Discovery               leads()
 * @method Meetings\Discovery            meetings()
 * @method Notes\Discovery               notes()
 * @method PostalMail\Discovery          postalMail()
 * @method SearchApi                     searchApi()
 * @method Tasks\Discovery               tasks()
 * @method Taxes\Discovery               taxes()
 */
class Discovery extends DiscoveryBase {}
