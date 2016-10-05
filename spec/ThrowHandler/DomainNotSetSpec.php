<?php

namespace spec\Shrikeh\PagerDuty\Application\ThrowHandler;

use Pimple\Container;
use Shrikeh\PagerDuty\Application\Exception\DomainNotSet as DomainNotSetException;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DomainNotSetSpec extends ObjectBehavior
{
  function it_throws_a_domain_not_set_exception()
  {
      $msg = 'test';
      $this->beConstructedWith($msg);
      $this->shouldThrow(new DomainNotSetException($msg))->duringThrow();
  }

  function it_is_invokable(
      Container $c
  ) {
      $msg = 'test';
      $this->beConstructedWith($msg);
      $this->shouldThrow(new DomainNotSetException($msg))
          ->during('__invoke', array($c));
  }
}
