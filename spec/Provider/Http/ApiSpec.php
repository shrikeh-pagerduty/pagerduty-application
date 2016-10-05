<?php

namespace spec\Shrikeh\PagerDuty\Application\Provider\Http;

use Pimple\Container;
use Shrikeh\PagerDuty\Application\Provider\Auth;
use Shrikeh\PagerDuty\Application\Provider\Http\Api;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ApiSpec extends ObjectBehavior
{
    function let(Container $con)
    {
        $con->offsetGet(Auth::PROVIDER_AUTH_TOKEN)->willReturn('token');
        $con->offsetSet(Argument::any(), Argument::any())->willReturn(true);
    }

    function it_throws_an_exception_if_domain_is_not_set($con) {
        $con->offsetExists(Api::PROVIDER_HTTP_DOMAIN)->willReturn(false);
        $con->offsetSet(
            Api::PROVIDER_HTTP_DOMAIN,
            Argument::type('Shrikeh\PagerDuty\Application\ThrowHandler\DomainNotSet')
        )->shouldBeCalled();

        $this->register($con);
    }

    function it_does_not_overwrite_an_existing_domain($con) {
        $con->offsetExists(Api::PROVIDER_HTTP_DOMAIN)->willReturn(true);
        $con->offsetSet(
            Api::PROVIDER_HTTP_DOMAIN,
            Argument::any()
        )->shouldNotBeCalled();
        $this->register($con);
    }
}
