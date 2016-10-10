<?php

namespace spec\Shrikeh\PagerDuty\Application\Exception;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TokenNotSetSpec extends ObjectBehavior
{
    function it_is_a_variable_not_set_exception()
    {
        $this->shouldHaveType(
            'Shrikeh\PagerDuty\Application\Exception\VariableNotSet'
        );
    }

    function it_is_a_domain_exception()
    {
        $this->shouldHaveType(
            'DomainException'
        );
    }
}
