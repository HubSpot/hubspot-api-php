<?php

namespace HubSpot\Discovery;

use HubSpot\Http\Request;

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
     * @param $options = [
     *                  'method' => string, // Optional. Default value GET
     *                  'path' => string, // Optional. Default value null
     *                  'headers' => array, // Optional.
     *                  'body' => mixed, // Optional.
     *                  'authType' => enum(none, accessToken, hapikey), // Optional.
     *                  'baseUrl' => string, // Optional.
     *                  'qs' => array, // Optional.
     *                  'defaultJson' => bool, // Optional.
     *                  ]
     */
    public function apiRequest(array $options = [])
    {
        $request = new Request($this->config, $options);

        return $this->client->request($request->getMethod(), $request->getUrl(), $request->getOptionsForSending());
    }
}
