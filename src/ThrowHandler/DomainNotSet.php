<?php

namespace Shrikeh\PagerDuty\Pimple\ThrowHandler;

use Shrikeh\PagerDuty\Pimple\Invokable;
use Shrikeh\PagerDuty\Pimple\ThrowHandler;
use Shrikeh\PagerDuty\Pimple\Exception\DomainNotSet as DomainNotSetException;

final class DomainNotSet implements Invokable, ThrowHandler
{
  use \Shrikeh\PagerDuty\Pimple\VariableNotSet;

  public function throw()
  {
    throw new DomainNotSetException(
        $this->msg,
        $this->errorCode
    );
  }
}
