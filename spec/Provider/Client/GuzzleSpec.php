<?php

namespace spec\Shrikeh\PagerDuty\Application\Provider\Client;

use Pimple\Container;
use Shrikeh\PagerDuty\Application\Provider\Client\Guzzle as GuzzleProvider;
use Shrikeh\PagerDuty\Application\Provider\Client as ClientServiceProvider;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GuzzleSpec extends ObjectBehavior
{
    function it_registers_a_client_with_the_container(
        Container $con
    )
    {
        $con->offsetSet(
            ClientServiceProvider::PROVIDER_CLIENT,
            Argument::type('Closure')
        )->shouldBeCalled();
        $con->offsetSet(
            GuzzleProvider::PROVIDER_CLIENT_GUZZLE,
            Argument::type('Closure')
        )->shouldBeCalled();
        $this->register($con);
    }
}
