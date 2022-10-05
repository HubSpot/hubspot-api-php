<?php

namespace HubSpot\Discovery;

use Hubspot\Http\Request;

/**
 * @method Auth\Discovery                     auth()
 * @method Automation\Discovery               automation()
 * @method Cms\Discovery                      cms()
 * @method Conversations\Discovery            conversations()
 * @method CommunicationPreferences\Discovery communicationPreferences()
 * @method Crm\Discovery                      crm()
 * @method Events\Discovery                   events()
 * @method Files\Discovery                    files()
 * @method Marketing\Discovery                marketing()
 * @method Settings\Discovery                 settings()
 * @method Webhooks\Discovery                 webhooks()
 */
class Discovery extends DiscoveryBase
{
    /**
     * method?: string
     * headers?: { [key: string]: string }
     * body?: any
     * authType?: string
     * overlapUrl?: string
     * path?: string
     * qs?: { [key: string]: any }
     * defaultJson?: boolean
     */
    public function apiRequest(array $options = [])
    {
        $request = new Request($this->config, $options);

        return $request;
    }
}
