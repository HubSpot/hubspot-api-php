<?php

namespace spec\HubSpot;

use HubSpot\Discovery\Discovery;
use PhpSpec\ObjectBehavior;

class FactorySpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedThrough('create');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Discovery::class);
    }
}
