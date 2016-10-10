<?php

namespace spec\Shrikeh\PagerDuty\Pimple\Exception;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DomainNotSetSpec extends ObjectBehavior
{
    function it_is_a_variable_not_set_exception()
    {
        $this->shouldHaveType(
            'Shrikeh\PagerDuty\Pimple\Exception\VariableNotSet'
        );
    }

    function it_is_a_domain_exception()
    {
        $this->shouldHaveType(
            'DomainException'
        );
    }
}
