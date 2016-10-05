<?php

namespace Shrikeh\PagerDuty\Application\ThrowHandler;

use Shrikeh\PagerDuty\Application\Invokable;
use Shrikeh\PagerDuty\Application\ThrowHandler;
use Shrikeh\PagerDuty\Application\Exception\DomainNotSet as DomainNotSetException;

final class DomainNotSet implements Invokable, ThrowHandler
{
  use \Shrikeh\PagerDuty\Application\VariableNotSet;

  public function throw()
  {
    throw new DomainNotSetException(
        $this->msg,
        $this->errorCode
    );
  }
}
