<?php

namespace spec\HubSpot\Discovery\Cms;

use GuzzleHttp\Client;
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
        $this->shouldHaveType(\HubSpot\Discovery\Cms\Discovery::class);
    }

    public function it_creates_clients()
    {
        $this->auditLogs()->shouldHaveType(\HubSpot\Discovery\Cms\AuditLogs\Discovery::class);
        $this->blogs()->shouldHaveType(\HubSpot\Discovery\Cms\Blogs\Discovery::class);
        $this->domains()->shouldHaveType(\HubSpot\Discovery\Cms\Domains\Discovery::class);
        $this->hubdb()->shouldHaveType(\HubSpot\Discovery\Cms\Hubdb\Discovery::class);
        $this->pages()->shouldHaveType(\HubSpot\Discovery\Cms\Pages\Discovery::class);
        $this->performance()->shouldHaveType(\HubSpot\Discovery\Cms\Performance\Discovery::class);
        $this->siteSearch()->shouldHaveType(\HubSpot\Discovery\Cms\SiteSearch\Discovery::class);
        $this->sourceCode()->shouldHaveType(\HubSpot\Discovery\Cms\SourceCode\Discovery::class);
        $this->urlRedirects()->shouldHaveType(\HubSpot\Discovery\Cms\UrlRedirects\Discovery::class);
    }
}
